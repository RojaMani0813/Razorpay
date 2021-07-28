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
Route::get('/', 'CourseController@index');

Route::get('/courses', 'CourseController@index')->name('course');

Route::get('/add', 'CourseController@create')->name('add-movie');

Route::post('/store', 'CourseController@store')->name('store-movie');

Route::post('/paywithrazorpay', 'CourseController@razorpay');