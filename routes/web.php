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
Route::get('/home', 'HomeController@index')->name('home');

// Question Route
Route::get('/newQuestions', 'QuestionController@create');
Route::post('/question', 'QuestionController@store');
Route::get('/question/{question_id}', 'QuestionController@show');
Route::get('/question/{question_id}/edit', 'QuestionController@edit');
Route::post('/question/{question_id}', 'QuestionController@update');
Route::delete('/question/{question_id}/delete', 'QuestionController@destroy');

// Answer Route
Route::get('/answer/{question_id}', 'AnswerController@create');
Route::post('/answer/{question_id}', 'AnswerController@store');
Route::get('/answer/{answer_id}/edit', 'AnswerController@edit');
Route::post('/answer/{answer_id}/update', 'AnswerController@update');
Route::delete('/answer/{answer_id}/delete', 'AnswerController@destroy');
Route::get('/myanswer/{user_id}', 'HomeController@showAnswers');
Route::get('/mycomment/{user_id}', 'AnswerController@comment');

// Comment Route
Route::post('/commentQuestion/{question_id}', 'CommentController@storeQ');
Route::post('/commentAnswer/{answer_id}', 'CommentController@storeA');
Route::delete('/comment/{comment_id}/delete', 'CommentController@destroy');


// Route ga kepake
Route::get('/myQuestion', function () {
    return view('myQuestion');
});

Route::get('/view', function () {
    return view('viewQuestions');
});

Route::get('/myProfile', function () {
    return view('myProfile');
});

// Route buatan mas Yohanes
Route::get('/home/{user_id}', 'HomeController@show');
Route::get('/myQuestion/{user_id}', 'HomeController@showQuestions');
Route::get('/tagQuestion/{tag_id}', 'TagController@showQuestions');

