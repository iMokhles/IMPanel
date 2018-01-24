<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Interface Routes
// Language
Route::get('language/texts/vendor/{lang?}/{file?}/{folder?}', 'LanguageCrudController@showVendorTexts');
Route::post('language/texts/vendor/{lang?}/{file?}/{folder?}', 'LanguageCrudController@updateVendorTexts');
Route::get('language/texts/{lang?}/{file?}', 'LanguageCrudController@showTexts');
Route::post('language/texts/{lang}/{file}', 'LanguageCrudController@updateTexts');
CRUD::resource('language', 'LanguageCrudController');
Route::get('language/texts', 'LanguageCrudController@showTexts');

CRUD::resource('permission', 'PermissionCrudController');
CRUD::resource('role', 'RoleCrudController');
CRUD::resource('admin', 'AdminCrudController');
CRUD::resource('setting', 'SettingCrudController');