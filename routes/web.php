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

Route::get('/','UserController@index');
Route::resource('racks','RackController');
Route::get('add/new/rack','RackController@create');
Route::resource('racks/{id}/books','BooksController');
Route::get('racks/{id}/books/create','BooksController@create');
Route::get('admin','UserController@showAdminLogin');
Route::post('login','AuthController@login');
Route::post('client/login','AuthController@clientLogin');
Route::get('client','UserController@showClientLogin');
Route::get('signup','UserController@showSignup');
Route::post('user/signup','AuthController@signup');
