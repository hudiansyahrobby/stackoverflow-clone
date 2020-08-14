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

Route::get('/question/{question_id}', 'QuestionController@show');

Route::get('/question/{question_id}/edit', 'QuestionController@edit');

Route::post('/question/{question_id}', 'QuestionController@update');

Route::delete('/question/{question_id}/delete', 'QuestionController@destroy');

Route::get('/answer/{question_id}', 'AnswerController@create');

Route::post('/answer', 'AnswerController@store');

Route::get('/myQuestion', function () {
    return view('myQuestion');
});

Route::get('/view', function () {
    return view('viewQuestions');
});

Route::get('/myProfile', function () {
    return view('myProfile');
});

Route::get('/home/{user_id}', 'HomeController@show');

Route::get('/myQuestion/{user_id}', 'HomeController@showQuestions');
