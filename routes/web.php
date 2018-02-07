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
//USERS
Route::get('/home/users','UserController@index');

//route pour la modification (edit)
Route::get('/home/users/{id}/edit','UserController@edit');
Route::post('/home/users/{id}/edit','UserController@update');

//route pour la vue sur un seul utilisateur
Route::get('/home/users/{id}','UserController@show');

//route pour supprimer un utilisateur
Route::get('/home/users/{id}/delete', 'UserController@destroy');

///////////////////////////////////////////////////////////////////////////

//NEWS ITEM
Route::get('/home/newsitems', 'NewsitemController@index');

//Créer une news
Route::post('/home/newsitems', 'NewsitemController@store');
Route::get('/home/newsitems/new', 'NewsitemController@new');

//route pour la modification (edit)
Route::post('/home/newsitems/{id}/edit','NewsitemController@update');
Route::get('/home/newsitems/{id}/edit','NewsitemController@edit');

//route pour la vue sur un seul nouvel item
Route::get('/home/newsitems/{id}','NewsitemController@show');

//route pour supprimer un utilisateur
Route::get('/home/newsitems/{id}/delete', 'NewsitemController@destroy');

///////////////////////////////////////////////////////////////////////////
//USERTYPE
Route::get('/home/userstypes','UserstypeController@index');

//Créer un usertype
Route::post('/home/userstypes', 'UsertypeController@store');
Route::get('/home/userstypes/new', 'UsertypeController@new');

//route pour la modification (edit)
Route::post('/home/userstypes/{id}/edit','UsertypeController@update');
Route::get('/home/userstypes/{id}/edit','UsertypeController@edit');

//route pour la vue sur un seul type utilisateur
Route::get('/home/userstypes/{id}','UsertypeController@show');

//route pour supprimer un utilisateur
Route::get('/home/userstypes/{id}/delete', 'UsertypeController@destroy');


///////////////////////////////////////////////////////////////////////////
//CATEGORY
Route::get('/home/categorys','CategoryController@index');

//Créer un usertype
Route::post('/home/categorys', 'CategoryController@store');
Route::get('/home/categorys/new', 'CategoryController@new');

//route pour la modification (edit)
Route::post('/home/categorys/{id}/edit','CategoryController@update');
Route::get('/home/categorys/{id}/edit','CategoryController@edit');

//route pour la vue sur un seul type utilisateur
Route::get('/home/categorys/{id}','CategoryController@show');

//route pour supprimer un utilisateur
Route::get('/home/categorys/{id}/delete', 'CategoryController@destroy');

///////////////////////////////////////////////////////////////////////////
//CATEGORY
Route::get('/home/rssfeeds','RssfeedController@index');

//Créer un RssFeedController
Route::post('/home/rssfeeds', 'RssfeedController@store');
Route::get('/home/rssfeeds/new', 'RssfeedController@new');
