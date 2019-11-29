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
Route::group([
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('loan-types', 'LoanTypeController');
});

Route::get('send-mail-to', 'BasicController@sendMailTo')->name('basic.send-mail-to');
Route::get('change-language', 'BasicController@changeLanguage')->name('basic.change-language');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
