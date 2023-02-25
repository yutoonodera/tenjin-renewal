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

Route::group(['middleware' => 'auth'], function() {
Route::get('/admin/movee', 'AdminController@index')->name('admin.index');

Route::get('/admin/main/edit/{pageId}', 'AdminMainController@editMainForm')->name('admin.main.edit');
Route::post('/admin/main/edit/{pageId}', 'AdminMainController@editMain');
Route::get('/admin/main/delete/{pageId}/{imagename}', 'AdminMainController@deleteImage')
->name('admin.main.delete.image');

Route::get('/admin/pages/{url}', 'AdminPageController@page')->name('admin.pages.index');
Route::get('/admin/page/new', 'AdminPageController@newForm')->name('admin.page.new');
Route::post('/admin/page/new', 'AdminPageController@new');
// Route::get('/admin/page/newreq', 'AdminPageController@newReqForm')->name('admin.page.newreq');

Route::get('/admin/page/edit/{pageId}', 'AdminPageController@editForm')->name('admin.page.edit');
Route::post('/admin/page/edit/{pageId}', 'AdminPageController@edit');
Route::delete('/admin/page/delete/{pageId}', 'AdminPageController@delete')->name('admin.page.delete');
Route::get('/admin/page/delete/{pageId}/{imagename}', 'AdminPageController@deleteImage')
->name('admin.page.delete.image');

});

// Route::get('/admin/blogs/{url}', 'AdminBlogController@blog')->name('admin.blogs.index');
// Route::get('/admin/blog/new', 'AdminBlogController@newForm')->name('admin.blog.new');
// Route::post('/admin/blog/new', 'AdminBlogController@new');

Route::post('/send', 'MailController@send');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
