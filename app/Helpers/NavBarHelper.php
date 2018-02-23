<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 22/01/2018
 * Time: 04:09
 */

namespace App\Helpers;


use App\Admin;
use App\Models\NavbarBtn;
use App\Models\SideMenuItem;
use App\Models\SideMenuSection;
use Illuminate\Http\Response;

class NavBarHelper
{
    public static function btnsActive() {
        $activeBtns = NavbarBtn::where('parent_id', 0)->where('is_active', 1)->orderby('sort', 'asc')->get();
        foreach ($activeBtns as $menu) {
            $childs = NavbarBtn::where('is_active', 1)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = NavbarBtn::where('is_active', 1)
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
        $disabledMenus = NavbarBtn::where('parent_id', 0)->where('is_active', 0)->orderby('sort', 'asc')->get();

        foreach ($disabledMenus as $menu) {
            $childs = NavbarBtn::where('is_active', 0)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = NavbarBtn::where('is_active', 0)
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

        if ($model instanceof \App\Models\NavbarBtn) {
            return self::btnsDisabled();
        }
    }
    public static function activeBtns($model) {

        if ($model instanceof \App\Models\NavbarBtn) {
            return self::btnsActive();
        }
    }
    public static function getNonRoundedNavBarBtns() {
        $activeBtns = NavbarBtn::where('parent_id', 0)
            ->where('is_active', 1)
            ->where('is_rounded', 0)
            ->orderby('sort', 'asc')->get();
        return $activeBtns;
    }
    public static function getRoundedNavBarBtns() {
        $activeBtns = NavbarBtn::where('parent_id', 0)
            ->where('is_active', 1)
            ->where('is_rounded', 1)
            ->orderby('sort', 'asc')->get();
        return $activeBtns;
    }
}