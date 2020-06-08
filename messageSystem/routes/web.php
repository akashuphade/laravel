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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'MessagesController@index')->name('home');
Route::get('/create/{id?}/{subject?}', 'MessagesController@createMessage')->name('create');
Route::post('/send', 'MessagesController@sendMessage')->name('send');
Route::get('view/{id}/{deleted?}', 'MessagesController@show');
Route::put('delete/{id}', 'MessagesController@destroy');
Route::get('deleted', 'MessagesController@getDeleted')->name('deleted');
Route::get('sent', 'MessagesController@getSent')->name('sent');
Route::get('sentDetail/{id}', 'MessagesController@getSentDetails');
Route::get('/undelete/{id}', 'MessagesController@undeleteMessage');