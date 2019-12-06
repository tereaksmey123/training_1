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
// GET POST PUT PATCH DELETE
// category, products

Route::group([
    // 'middleware' => ['check.language'],
    // 'as', 
    // 'prefix',
    'namespace' => 'Admin'
], function () {
    Route::resource('products', 'ProductController')->middleware('check.language');
    Route::resource('categories', 'CategoryController');
});

// Route::get('/', function () {
//     return view('welcome');
// });
