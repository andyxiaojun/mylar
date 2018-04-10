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

Route::get('/', 'PagesController@root')->name('root');

Route::get('sigup','UsersController@create')->name('sigup');
Route::resource('users', 'UsersController');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

Route::get('channel','ChannelController@create')->name('channel');
Route::post('channel','ChannelController@store')->name('channel.store');

Route::get('room/{channel}','ChannelController@show')->name('room');
Route::post('room','ChannelController@Rstore')->name('room.Rstore');