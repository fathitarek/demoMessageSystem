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
Route::get('/users', 'UserController@index')->name('users');

Route::get('/chat/{to_id}', 'MessagesController@viewPage');

Route::post('/sendMessage', 'MessagesController@SendMessage');

Route::get('/getMsg/{from_id}/{to_id}', 'MessagesController@getMessages');


/*
Route::get('conversation', 'Evilnet\Inbox\InboxController@create');
Route::post('conversation', 'Evilnet\Inbox\InboxController@store');
Route::get('conversation/{id}', 'Evilnet\Inbox\InboxController@show');
Route::post('message/{id}', 'Evilnet\Inbox\InboxController@addMessage');
Route::get('inbox', 'Evilnet\Inbox\InboxController@index')->name('inbox');
Route::delete('/conversation/{id}', '\Evilnet\Inbox\InboxController@destroy');*/
