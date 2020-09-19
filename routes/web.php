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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/directory', 'DirectoryController@index')->name('directory');
Route::get('/view-files/{directoryId}', 'DirectoryController@viewFiles')->name('view-file');
Route::get('/deleted-files/{directoryId}', 'DirectoryController@deletedFiles')->name('view-file');
Route::get('/upload-files/{directoryId}', 'DirectoryController@uploadFiles')->name('upload-files');
Route::post('/store-file/{directoryId}', 'DirectoryController@storeFile')->name('store-file');
Route::get('/delete-file/{fileId}', 'DirectoryController@deleteFile')->name('delete-file');
