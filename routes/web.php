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

Route::get('/','SearchsController@index')->name('index');
Route::post('/store','SearchsController@store')->name('store');
Route::get('/company_register','SearchsController@company_register')->name('company_register');
Route::post('/company_store','SearchsController@company_store')->name('company_store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}','SearchsController@show')->name('show');
