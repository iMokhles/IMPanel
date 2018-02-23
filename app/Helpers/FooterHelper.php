<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 22/01/2018
 * Time: 04:09
 */

namespace App\Helpers;


use App\Admin;
use App\Models\FooterBtn;
use App\Models\NavbarBtn;
use App\Models\SideMenuItem;
use App\Models\SideMenuSection;
use Illuminate\Http\Response;

class FooterHelper
{
    public static function btnsActive() {
        $activeBtns = FooterBtn::where('parent_id', 0)->where('is_active', 1)->orderby('sort', 'asc')->get();
        foreach ($activeBtns as $menu) {
            $childs = FooterBtn::where('is_active', 1)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = FooterBtn::where('is_active', 1)
                            ->where('parent_id', $child->id)
                            ->orderby('sort', 'asc')->get();
                        if (count($subChilds) > 0) {
                            $subChildsArray = [];
                            foreach ($subChilds as $subChild) {

                                if ($subChild->id != $child->id) {
                                    array_push($subChildsArray, $subChild);
                                }
                            }
                            if (count($subChildsArray) > 0) {
                                $child->children = $subChildsArray;
                            }
                        }
                        array_push($childsArray, $child);
                    }
                }
                if (count($childsArray) > 0) {
                    $menu->children = $childsArray;
                }
            }
        }
        return $activeBtns;
    }
    public static function btnsDisabled() {
        $disabledMenus = FooterBtn::where('parent_id', 0)->where('is_active', 0)->orderby('sort', 'asc')->get();

        foreach ($disabledMenus as $menu) {
            $childs = FooterBtn::where('is_active', 0)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = FooterBtn::where('is_active', 0)
                            ->where('parent_id', $child->id)
                            ->orderby('sort', 'asc')->get();
                        if (count($subChilds) > 0) {
                            $subChildsArray = [];
                            foreach ($subChilds as $subChild) {

                                if ($subChild->id != $child->id) {
                                    array_push($subChildsArray, $subChild);
                                }
                            }
                            if (count($subChildsArray) > 0) {
                                $child->children = $subChildsArray;
                            }
                        }
                        array_push($childsArray, $child);
                    }
                }
                if (count($childsArray) > 0) {
                    $menu->children = $childsArray;
                }
            }
        }

        return $disabledMenus;
    }

    public static function disabledBtns($model) {

        if ($model instanceof \App\Models\FooterBtn) {
            return self::btnsDisabled();
        }
    }
    public static function activeBtns($model) {

        if ($model instanceof \App\Models\FooterBtn) {
            return self::btnsActive();
        }
    }
    public static function getFooterBtns() {
        $activeBtns = FooterBtn::where('parent_id', 0)
            ->where('is_active', 1)
            ->orderby('sort', 'asc')->get();
        return $activeBtns;
    }
}