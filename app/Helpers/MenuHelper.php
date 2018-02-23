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
use Illuminate\Http\Response;

class MenuHelper
{
    public static function menuActiveForSection($sectionId) {

        $section = SideMenuSection::where('id', $sectionId)->orderby('sort', 'asc')->first();
        $sectionMenus = $section->items()->where('parent_id', 0)->where('is_active', 1)->orderby('sort', 'asc')->get();

        $activeMenus = $sectionMenus;
        foreach ($activeMenus as $menu) {
            $childs = SideMenuItem::where('is_active', 1)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = \App\Models\SideMenuItem::where('is_active', 1)
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
        return $activeMenus;
    }

    public static function menuDisabledForSection($sectionId) {

        $section = SideMenuSection::where('id', $sectionId)->orderby('sort', 'asc')->first();
        $sectionMenus = $section->items()->where('parent_id', 0)->where('is_active', 0)->orderby('sort', 'asc')->get();
        $disabledMenus = $sectionMenus;

        foreach ($disabledMenus as $menu) {
            $childs = SideMenuItem::where('is_active', 0)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = \App\Models\SideMenuItem::where('is_active', 0)
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

    private static function menuActive() {
        $activeMenus = SideMenuItem::where('parent_id', 0)->where('is_active', 1)->orderby('sort', 'asc')->get();
        foreach ($activeMenus as $menu) {
            $childs = SideMenuItem::where('is_active', 1)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = \App\Models\SideMenuItem::where('is_active', 1)
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
        return $activeMenus;
    }
    public static function menuDisabled() {
        $disabledMenus = SideMenuItem::where('parent_id', 0)->where('is_active', 0)->orderby('sort', 'asc')->get();

        foreach ($disabledMenus as $menu) {
            $childs = SideMenuItem::where('is_active', 0)
                ->where('parent_id', $menu->id)
                ->orderby('sort', 'asc')->get();

            if (count($childs) > 0) {
                $childsArray = [];
                foreach ($childs as $child) {
                    if ($child->id != $menu->id) {

                        // get sub child
                        $subChilds = \App\Models\SideMenuItem::where('is_active', 0)
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
    public static function activeSection() {
        $activeSections = SideMenuSection::where('is_active', 1)->orderby('sort', 'asc')->get();
        return $activeSections;
    }
    public static function disabledSection() {
        $activeSections = SideMenuSection::where('is_active', 0)->orderby('sort', 'asc')->get();
        return $activeSections;
    }
    public static function allSections() {
        $allSections = SideMenuSection::orderby('sort', 'asc')->get();
        return $allSections;
    }

    public static function disabledMenus($model) {

        if ($model instanceof \App\Models\SideMenuItem) {
            return self::menuDisabled();
        } else if ($model instanceof \App\Models\SideMenuSection) {
            return self::disabledSection();
        }
    }
    public static function activeMenus($model) {

        if ($model instanceof \App\Models\SideMenuItem) {
            return self::menuActive();
        } else if ($model instanceof \App\Models\SideMenuSection) {
            return self::activeSection();
        }
    }
    public static function getSideMenu() {

        $sections = \App\Models\SideMenuSection::where('is_active', 1)->orderby('sort', 'asc')->get();

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
            $items = $section->items()->where('parent_id', 0)->orderby('sort', 'asc')->get();
            $itemsArray = [];
            foreach ( $items as $item) {
                $activeMenus = \App\Models\SideMenuItem::where('id', $item->id)->where('parent_id', 0)->where('section_id', $section->id)->where('is_active', 1)->orderby('sort', 'asc')->get();
                foreach ($activeMenus as $menu) {
                    $childs = \App\Models\SideMenuItem::where('is_active', 1)
                        ->where('parent_id', $menu->id)
                        ->orderby('sort', 'asc')->get();

                    if (count($childs) > 0) {
                        $childsArray = [];
                        foreach ($childs as $child) {
                            if ($child->id != $menu->id) {

                                // get sub child
                                $subChilds = \App\Models\SideMenuItem::where('is_active', 1)
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
                    array_push($itemsArray, $menu);
                }

                $sectionsItems[$section->name] = $itemsArray;
            }
        }
        return $sectionsItems;
    }
}