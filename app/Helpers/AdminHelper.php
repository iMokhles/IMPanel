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

    /**
     * @return Admin
     */
    public static function currentAdmin() {
        return Admin::find(self::currentUser()->id);
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function currentUser() {
        return Auth::guard(self::$guard_web)->user();
    }

    /**
     * @return mixed
     */
    public static function userId() {
        return self::currentAdmin()->id;
    }

    /**
     * @return mixed
     */
    public static function name() {
        return self::currentAdmin()->name;
    }

    /**
     * @return mixed
     */
    public static function email() {
        return self::currentAdmin()->email;
    }

    /**
     * @return mixed
     */
    public static function apiToken() {
        return self::currentAdmin()->api_token;
    }

    /**
     * @return mixed
     */
    public static function isSuperAdmin() {
        return self::currentAdmin()->hasRole('SuperAdmin');
    }

    /**
     * @param $role
     * @return mixed
     */
    public static function hasRole($role) {
        return self::currentAdmin()->hasRole($role);
    }

    /**
     * Current Unread Notifications Count
     *
     * @return int
     */
    public static function unreadNotificationsCount() {
        return count(self::currentAdmin()->unreadNotifications()->get());
    }

    /**
     * Current Unread Notifications
     *
     * @return mixed
     */
    public static function unreadNotifications() {
        return self::currentAdmin()->unreadNotifications()->get();
    }
}