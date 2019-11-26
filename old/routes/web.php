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
Route::group(['namespace' => 'Front'], function () {
    Route::resource('contact', 'ContactController');
});





// Route::get('contact-page', 'ContactPageController@index');

// Route::get('contact-page/{id}', function ($id) {
//     echo 'COntact  Page'.$id;
// });


// Route::get('contact-page', function () {
//     echo 'COntact  Page';
// });

Route::get('/', function () {
    return view('welcome');
});
