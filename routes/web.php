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
Auth::routes(['verify'=> true]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('admin')->group(function () {

    Route::resource('category', 'CategoryController', [
        'except' => 'show'
    ]);
});

Route::middleware('auth','verified')->group(function () {

    Route::resource('music', 'MusicController', [
        'only' => ['create', 'store', 'destroy', 'update']
    ]);
});

Route::name('category')->get('category/{slug}', 'MusicController@category');

Route::name('user')->get('user/{user}', 'MusicController@user');