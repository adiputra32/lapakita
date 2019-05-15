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

Route::get('/', 'ShopController@index')->name('welcome');

Auth::routes();

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'user'], function () { 
    Route::get('/regis','Auth\RegisterController@showRegistrationForm')->name('user.regis'); 
    Route::post('/regis','Auth\RegisterController@register')->name('user.regis.submit');//with trait on Vendor/Foundation/RegisterUser
    Route::get('/login','Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'Auth\LoginController@login')->name('user.login.submit');
    Route::get('/logout','Auth\LoginController@logoutUser')->name('user.logout');
    Route::get('/home', 'ShopController@index')->name('user.home');       
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/logout','AuthAdmin\LoginController@logoutAdmin')->name('admin.logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
