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
Route::get('/', 'DisplayController@index')->name('display.index');
Route::get('/{url}', 'DisplayController@mainPage')->name('display.mainPage');
Route::get('/pages/{url}', 'DisplayController@privatePage')->name('display.privatePage');

Route::get('/contact/new', 'ContactController@newForm')->name('contact.new');
Route::post('/contact/new', 'ContactController@new');
