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



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.reset');

Route::get('/home', 'HomeController@index')->name('admin.home');
Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
Route::get('/', 'HomeController@redirect')->name('admin.redirect');

Route::get('edit-account-info', 'Auth\AdminAccountController@showAccountInfoForm')->name('admin.account.info');
Route::post('edit-account-info', 'Auth\AdminAccountController@accountInfoForm')->name('admin.account.info');
Route::get('change-password', 'Auth\AdminAccountController@showChangePasswordForm')->name('admin.account.password');
Route::post('change-password', 'Auth\AdminAccountController@changePasswordForm')->name('admin.account.password');

// Analytics
Route::get('analytics', 'AdminAnalyticsController@index')->name('admin.analytics.index');
Route::get('analytics/countries', 'AdminAnalyticsController@index')->name('admin.analytics.countries');
Route::get('analytics/browsers', 'AdminAnalyticsController@index')->name('admin.analytics.browsers');
Route::get('analytics/cities', 'AdminAnalyticsController@index')->name('admin.analytics.cities');
Route::get('analytics/os', 'AdminAnalyticsController@index')->name('admin.analytics.os');
Route::get('analytics/referrer', 'AdminAnalyticsController@index')->name('admin.analytics.referrer');
Route::get('analytics/urls', 'AdminAnalyticsController@index')->name('admin.analytics.urls');
Route::get('analytics/visitors', 'AdminAnalyticsController@index')->name('admin.analytics.visitors');



// Cruds
Route::post('savemenuitem_save', 'SideMenuItemCrudController@saveMenuItem')->name('admin.save.menu.item');
Route::post('sidemenusection_save', 'SideMenuSectionCrudController@saveSectionItem')->name('admin.save.section.item');

CRUD::resource('sidemenusection', 'SideMenuSectionCrudController');
CRUD::resource('sidemenuitem', 'SideMenuItemCrudController');

Route::post('navbarbtn_save', 'NavbarBtnCrudController@saveNavBarBtn')->name('admin.save.navbar.btn');
CRUD::resource('navbarbtn', 'NavbarBtnCrudController');

Route::post('footerbtn_save', 'FooterBtnCrudController@saveFooterBtn')->name('admin.save.footer.btn');
CRUD::resource('footerbtn', 'FooterBtnCrudController');