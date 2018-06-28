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
    return redirect()->route('faces');
});

Auth::routes();



Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/faces', 'FaceController@index')->name('faces');
  Route::post('/faces', 'FaceController@store');
  Route::post('/faces/update', 'FaceController@update');


  Route::get('/recognition/picture', 'PictureRecognition@index')->name('picture_recognition');

  Route::get('/faces/{id}/shoutouts', 'ShoutOutController@index');
  Route::post('/shout', 'ShoutOutController@store');
  Route::get('/shout/{id}/delete', 'ShoutOutController@destroy');
  Route::post('/shout/update', 'ShoutOutController@update');
});

/* Files */
Route::get('/files/{id}', 'FileController@download')->name('files.download');
Route::get('/files/{id}/delete', 'FileController@deleteFile')->name('files.delete');
