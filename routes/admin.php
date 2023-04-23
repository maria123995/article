<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('admin1')->namespace('Admin')->as('admin.')-> middleware('auth:admin')->group(function () {


    Route::get('/', 'DashboardController@index')->name('dashboard');

    // news
    Route::resource('news', 'NewsController');

    // section
    Route::resource('admin', 'adminController');

    //user
    Route::resource('user', 'UserController');

    //comment
     Route::resource('comment', 'CommentController');

});

