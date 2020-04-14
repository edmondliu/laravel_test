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


use Illuminate\Support\Facades\Route;

Route::any('/user/index', 'Web\UserController@index');
Route::any('/login', 'Web\UserController@login');
Route::post('/user/create_user', 'Web\UserController@createUser');
Route::get('/user/{id}', 'Web\UserController@getUser')->where(['id' => '\d+']);

