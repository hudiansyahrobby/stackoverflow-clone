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
<<<<<<< HEAD
Route::get('/view', function(){
    return view('viewQuestions');
});
Route::get('/myProfile', function(){
    return view('myProfile');
});

Route::get('/myQuestion', function(){
    return view('myQuestion');
});
=======
Route::get('/question/{question_id}', 'QuestionController@show');
>>>>>>> e9b6ffcee7af7d017a28c294b5c6bbf25cbee82f
