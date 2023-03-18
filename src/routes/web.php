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
Route::get('/', 'MoviePageController@index')->name('moviepage.index');
Route::get('/moviepage/new', 'MoviePageController@newForm')->name('moviepage.new');
Route::post('/moviepage/new', 'MoviePageController@new');
Route::get('/moviepage/thanks', 'MoviePageController@thanks')->name('moviepage.thanks');
Route::get('/{pageurl}', 'MoviePageController@myPage')->name('moviepage.mypage');
