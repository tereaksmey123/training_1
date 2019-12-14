<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'WebApi',
    'as' => 'web.'
], function () {
    Route::apiResource('products', 'ProductController');
});

// Login route and protect

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
Route::post('refresh', 'PassportController@refresh');
Route::post('user/reset-password', 'PassportController@resetPassword')->name('user.reset-password');

Route::middleware(['auth:api'])->group(function(){
    Route::post('logout', 'PassportController@logout');
    Route::get('user', 'PassportController@show')->name('user.show');
    Route::post('user', 'PassportController@update')->name('user.update');
    Route::post('user/change-password', 'PassportController@changePassword')->name('user.change-password');

    // 
});



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
