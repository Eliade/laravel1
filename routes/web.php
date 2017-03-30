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
// Liste de mes articles
Route::get('/articles','ArticleController@index');

// création d'article
Route::get('/articles/create','ArticleController@create')->middleware('auth');
Route::post('/articles/create','ArticleController@store')->middleware('auth');

// édition d'article
Route::get('/articles/edit/{id}','ArticleController@edit')->name('editerArticle');
Route::post('/articles/edit/{id}','ArticleController@update');

// show article
Route::get('/articles/show/{id}','ArticleController@show')->name('voirArticle');

// show by slug
Route::get('/articles/{slug}','ArticleController@showBySlug')->name('voirBySlug');

// delete article
Route::get('/articles/delete/{id}',function(){
    return 'NON ! ';
});
    Route::delete('/articles/delete/{id}','ArticleController@destroy')->name('destroy');

// gestion des routes Auth
Auth::routes();
Route::get('/home', 'HomeController@index');
