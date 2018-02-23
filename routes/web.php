<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/error/{errorCode}', function ($errorCode) {
    return view('errors.error', [
        'error_code' => $errorCode
    ]);
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test_menu', function () {

    return \App\Helpers\TRKHelper::getBrowsersStatics();
});

Route::get('/features', function () {

    return view('welcome');
});

Route::get('/about', function () {

    return view('welcome');
});

Route::get('/support', function () {

    return view('welcome');
});

