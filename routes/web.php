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
Route::resource('questions','QuestionsController')->except('show');
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
Route::resource('questions.answers','AnswersController')->except('index','create','show');
Route::post('/answers/{answer}/accept','AcceptAnswerController')->name('answers.accept');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');