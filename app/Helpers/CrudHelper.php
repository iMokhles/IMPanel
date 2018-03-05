<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 21/01/2018
 * Time: 23:49
 */

namespace App\Helpers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;

class CrudHelper
{
    public static function getBooleanBadge($id, $table, $field) {
        $item = \DB::table($table)->where('id', $id)->first();
        if (!isset($item->{$field})) return false;

        if (isset($item->{$field}) && $item->{$field} == 1) {
            $html = '<span class="label label-success">YES</span>';
        } else {
            $html = '<span class="label label-danger">NO</span>';
        }
        return $html;
    }
    public static function getIconBadge($id, $table, $field) {
        $item = \DB::table($table)->where('id', $id)->first();
        if (!isset($item->{$field})) return false;

        $html = "";
        if (isset($item->{$field})) {
            $html = '<a class="btn btn-default"><i class="fa '.$item->{$field}.'"></i></a>';
        }
        return $html;
    }
    public static function getIconBadgeFromMetaData($id, $table) {
        $item = \DB::table($table)->where('id', $id)->first();
        if (!isset($item->metadata)) return false;

        $html = "";
        if (isset($item->metadata)) {
            $metaInfo = json_decode($item->metadata, true);
            if (in_array('icon', $metaInfo)) {
                $html = '<a class="btn btn-default"><i class="fa '.$metaInfo['icon'].'"></i></a>';
            }
        }
        return $html;
    }
    public static function paginate($items,$perPage)
    {
        $pageStart = Request::get('page', 1);
        // Start displaying items from this number;
        $offSet = ($pageStart * $perPage) - $perPage;

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);

        return new LengthAwarePaginator($itemsForCurrentPage, count($items), $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }
}