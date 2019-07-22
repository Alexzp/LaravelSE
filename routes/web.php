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
Route::domain('{subdomain}.laravelse.com')->group(function () {
    
    Route::get('test/{param}', function ($subdomain, $param) {
        return "<h3>Current subdomain : $subdomain with url param : $param </h3>";
    });
    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Socialite routes
Route::prefix('social/auth')->name('social.')->namespace('Auth')->group(function () {

    Route::get('{provider}', 'SocialiteAuthController@authenticate')
        ->where(['provider' => 'facebook|google|twitter|github'])
        ->name('redirect');
    
    Route::get('{provider}/callback', 'SocialiteAuthController@socialiteCallback')
        ->where(['provider' => 'facebook|google|twitter|github'])
        ->name('callback');
});


