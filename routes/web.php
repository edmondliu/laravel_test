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
Route::put('/user/{id}', 'Web\UserController@updateUser');
Route::get('/getUrl', 'Web\UserController@getUrl');
Route::get('/testLog', 'Web\UserController@testLog');
Route::get('/user/sendEmail', 'Web\UserController@sendEmail');
Route::get('/user/catchRedis', 'Web\UserController@catchRedis');
Route::get('/user/getCatchRedis', 'Web\UserController@getCatchRedis');

Route::get('/collection/getCollection', 'Web\TestCollectionController@getCollection');
Route::get('/collection/testEvent', 'Web\TestCollectionController@testEvent');
Route::get('/collection/testJob', 'Web\TestCollectionController@testJob');
Route::get('/collection/testNotifiable', 'Web\TestCollectionController@testNotifiable');
