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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/newQuestions', 'QuestionController@create');
Route::post('/question', 'QuestionController@store');

Route::get('/home/{user_id}', 'HomeController@show');
Route::get('/myQuestion/{user_id}', 'HomeController@showQuestions');

Route::get('/question/{question_id}', 'QuestionController@show');
