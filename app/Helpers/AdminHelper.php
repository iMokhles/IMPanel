<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 22/10/2017
 * Time: 00:21
 */

namespace App\Helpers;


use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminHelper
{
    protected static $guard_web = 'admin';

    public static function currentUser() {
        return Auth::guard(self::$guard_web)->user();
    }
    public static function userId() {
        return self::currentUser()->id;
    }
    public static function name() {
        return self::currentUser()->name;
    }
    public static function email() {
        return self::currentUser()->email;
    }
    public static function apiToken() {
        return self::currentUser()->api_token;
    }
    public static function isSuperAdmin() {
        return self::currentUser()->hasRole('SuperAdmin');
    }
    public static function hasRole($role) {
        return self::currentUser()->hasRole($role);
    }
}