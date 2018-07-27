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

Route::get('/', "IndexController@index");
Route::post("/app", "AppController@index");
Route::get("/user", "UserController@index");
Route::get("/admin", "AdminController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
