<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('Questionair','HomeController@Questionair');
Route::get('Result','HomeController@Result');
Route::get('Questionair/create','HomeController@create');
Route::post('store','HomeController@store');
Route::get('addQuestion/{id}/Add','HomeController@addQuestion');
Route::get('Questionair/{id}/delete','HomeController@destroy');
Route::get('Questionair/{id}/edit','HomeController@edit');
Route::put('Questionair/{id}/update','HomeController@update');
Route::post('storeData','HomeController@storeData');
Route::get('showCount/{id}/show','HomeController@showCount');
Route::get('Text','HomeController@text');
Route::get('MCQ','HomeController@mcq');
Route::post('storetext','HomeController@storetext');
Route::post('MCQ','HomeController@store1');
Route::get('Result','HomeController@showResult');