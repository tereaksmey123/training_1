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

Route::get('/', function () {
    // $customer = '';
    // date('adasd', strototime());

    // [] json_decode
    /**
     * protected $dates = ['birthday'];
     * date('Y', strtotime($date));
     * $row->birthday->format('Y')
     * \Carbon\Carbon::parse($date)
     */
    // $row->birthday = 2019-03-13

    $user = \App\User::find(1);
    \Mail::to('test@test.com')->send(new \App\Mail\BasicSendMail($user));
    // a@a.com, b@b.com
    return view('welcome');
});
