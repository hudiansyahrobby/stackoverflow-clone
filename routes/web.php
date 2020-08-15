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

// Home Route --> from HomeController
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/myProfile/{user_id}', 'HomeController@showProfile');
Route::get('/myQuestion/{user_id}', 'HomeController@showQuestions');

// Question Route --> from QuestionController
Route::get('/question', 'QuestionController@create');
Route::post('/question', 'QuestionController@store');
Route::get('/question/{question_id}', 'QuestionController@show');
Route::get('/question/{question_id}/edit', 'QuestionController@edit');
Route::post('/question/{question_id}/update', 'QuestionController@update');
Route::delete('/question/{question_id}/delete', 'QuestionController@destroy');
Route::get('/question/{answer_id}/best', 'QuestionController@setBestAnswer');

// Answer Route --> from AnswerController
Route::get('/answer/{question_id}', 'AnswerController@create');
Route::post('/answer/{question_id}', 'AnswerController@store');
Route::get('/answer/{answer_id}/edit', 'AnswerController@edit');
Route::post('/answer/{answer_id}/update', 'AnswerController@update');
Route::delete('/answer/{answer_id}/delete', 'AnswerController@destroy');

// Comment Route --> from CommentController
Route::post('/commentQuestion/{question_id}', 'CommentController@storeQ');
Route::post('/commentAnswer/{answer_id}', 'CommentController@storeA');
Route::delete('/comment/{comment_id}/delete', 'CommentController@destroy');

// Vote Route
Route::get('/upvote_question/{question_id}', 'VoteController@upvoteQ');
Route::get('/downvote_question/{question_id}', 'VoteController@downvoteQ');
Route::get('/upvote_answer/{answer_id}', 'VoteController@upvoteA');
Route::get('/downvote_answer/{answer_id}', 'VoteController@downvoteA');

// Tag Route
Route::get('/tag/{tag_id}/{tag_name}', 'TagController@showQuestions');



