<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 22/01/2018
 * Time: 04:09
 */

namespace App\Helpers;


use App\Admin;
use App\Models\SideMenuItem;
use App\Models\SideMenuSection;
use App\Models\StatisticsSection;
use App\Models\StatisticsWidget;
use Illuminate\Http\Response;

class StatisticHelper
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function activeSection() {
        $activeSections = StatisticsSection::where('is_active', 1)->orderby('sort', 'asc')->get();
        return $activeSections;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function disabledSection() {
        $activeSections = StatisticsSection::where('is_active', 0)->orderby('sort', 'asc')->get();
        return $activeSections;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function allSections() {
        $allSections = StatisticsSection::orderby('sort', 'asc')->get();
        return $allSections;
    }

    public static function menuActiveForSection($sectionId) {

        $section = StatisticsSection::where('id', $sectionId)->orderby('sort', 'asc')->first();
        $sectionMenus = $section->widgets()->where('is_active', 1)->orderby('sort', 'asc')->get();
        $activeMenus = $sectionMenus;
        return $activeMenus;
    }

    public static function menuDisabledForSection($sectionId) {

        $section = StatisticsSection::where('id', $sectionId)->orderby('sort', 'asc')->first();
        $sectionMenus = $section->widgets()->where('is_active', 0)->orderby('sort', 'asc')->get();
        $disabledMenus = $sectionMenus;
        return $disabledMenus;
    }

    private static function menuActive() {
        $activeMenus = StatisticsWidget::where('is_active', 1)->orderby('sort', 'asc')->get();
        return $activeMenus;
    }
    public static function menuDisabled() {
        $disabledMenus = StatisticsWidget::where('is_active', 0)->orderby('sort', 'asc')->get();
        return $disabledMenus;
    }


    public static function disabledMenus($model) {

        if ($model instanceof \App\Models\StatisticsWidget) {
            return self::menuDisabled();
        } else if ($model instanceof \App\Models\StatisticsSection) {
            return self::disabledSection();
        }
    }
    public static function activeMenus($model) {

        if ($model instanceof \App\Models\StatisticsWidget) {
            return self::menuActive();
        } else if ($model instanceof \App\Models\StatisticsSection) {
            return self::activeSection();
        }
    }
    public static function getSideMenu() {

        $sections = \App\Models\StatisticsSection::where('is_active', 1)->orderby('sort', 'asc')->get();

        $sectionsArray = [];
        foreach ($sections as $section) {
            $sectionRole = $section->roles()->get();
            $hasRole =  Admin::find(AdminHelper::userId())->hasRole($sectionRole);
            if ($hasRole || AdminHelper::isSuperAdmin()) {
                array_push($sectionsArray, $section);
            }
        }

        $sectionsItems = [];
        foreach ($sectionsArray as $section) {
            $items = $section->widgets()->orderby('sort', 'asc')->get();
            $sectionsItems[$section->name] = $items;
        }
        return $sectionsItems;
    }

    public static function booleanColumns() {
        return [
            'active',
            'is_active',
            'blocked',
            'closed',
            'verified_email',
            'is_rounded',
            'default'
        ];
    }
}