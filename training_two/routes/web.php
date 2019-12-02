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

Route::get('categories', function () {});
Route::get('products', function () {});

Route::get('/', function () {
    return view('welcome');
});
