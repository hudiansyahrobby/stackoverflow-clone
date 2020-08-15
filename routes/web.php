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
Route::get('/home/{user_id}', 'HomeController@show');
Route::get('/myQuestion/{user_id}', 'HomeController@showQuestions');

// Question Route --> from QuestionController
Route::get('/question', 'QuestionController@create');
Route::post('/question', 'QuestionController@store');
Route::get('/question/{question_id}', 'QuestionController@show');
Route::get('/question/{question_id}/edit', 'QuestionController@edit');
Route::post('/question/{question_id}/update', 'QuestionController@update');
Route::delete('/question/{question_id}/delete', 'QuestionController@destroy');

// Answer Route --> from AnswerController
Route::get('/myanswer/{user_id}', 'AnswerController@index');
Route::get('/answer/{question_id}', 'AnswerController@create');
Route::post('/answer/{question_id}', 'AnswerController@store');
Route::get('/answer/{answer_id}/edit', 'AnswerController@edit');
Route::post('/answer/{answer_id}/update', 'AnswerController@update');
Route::delete('/answer/{answer_id}/delete', 'AnswerController@destroy');

// Comment Route
Route::post('/commentQuestion/{question_id}', 'CommentController@storeQ');
Route::post('/commentAnswer/{answer_id}', 'CommentController@storeA');
Route::delete('/comment/{comment_id}/delete', 'CommentController@destroy');

// Vote Route


// Tag Route
Route::get('/tagQuestion/{tag_id}', 'TagController@showQuestions');


/*
 * Route yang belum terpakai
 */
Route::get('/mycomment/{user_id}', 'AnswerController@comment');
Route::get('/myQuestion', function () {
    return view('myQuestion');
});

Route::get('/view', function () {
    return view('viewQuestions');
});

Route::get('/myProfile', function () {
    return view('myProfile');
});



