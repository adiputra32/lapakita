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
    Route::post('/home', 'ShopController@indexAdd')->name('user.home'); 
    Route::get('/category', 'ShopController@category')->name('user.category');
    Route::post('/category', 'ShopController@categoryAdd')->name('user.category');
    Route::post('/single-product', 'ShopController@singleProduct')->name('user.single-product');  
    Route::get('/cart', 'ShopController@cart')->name('user.cart');  
    Route::post('/checkout', 'ShopController@checkout')->name('user.checkout');  
    Route::get('/confirmation', 'ShopController@confirmation')->name('user.confirmation'); 
    Route::post('/confirmation', 'ShopController@confirmationAdd')->name('user.confirmation');  
    Route::get('/contact', 'ShopController@contact')->name('user.contact');   
    Route::get('/tracking', 'ShopController@tracking')->name('user.tracking');
    Route::get('/edit', 'UserController@show')->name('user.show');
    Route::match(['put','pacth'],'/update/{id}', 'UserController@update')->name('user.update');         
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/logout','AuthAdmin\LoginController@logoutAdmin')->name('admin.logout');

    Route::resource('/courier','Admin\AdminCourierController', [
        'names' => [
            'index' => 'admin.courier'
        ]
    ]);

    Route::resource('/product','Admin\AdminProductController', [
        'names' => [
            'index' => 'admin.product'
        ]
    ]);

    Route::resource('/category','Admin\AdminCategoryController', [
        'names' => [
            'index' => 'admin.category'
        ]
    ]);

    Route::resource('/user','Admin\AdminUserController', [
        'names' => [
            'index' => 'admin.user'
        ]
    ]);

    Route::resource('/transaction','Admin\AdminTransactionController', [
        'names' => [
            'index' => 'admin.transaction'
        ]
    ]);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

