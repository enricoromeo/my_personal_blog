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

Route::get('/', 'FrontendController@getIndex');
Route::get('articolo/{slug}', 'FrontendController@getArticolo')->name('article');
Route::get('autore/{slug}', 'FrontendController@getAutore');
Route::get('categoria/{slug}', 'FrontendController@getCategoria');
Route::get('tag/{tags}', 'FrontendController@getIndexByTag');
Route::get('trending', 'FrontendController@getTrandingArticles');

Route::get('dashboard', 'Backend\SessionsController@getIndex');

Route::get('dashboard/profile', 'Backend\SessionsController@profile')->name('profile');
Route::post('dashboard/profile', 'Backend\SessionsController@update_avatar');
//Auth::routes();

Route::get('register', 'Backend\RegistrationController@create');
Route::post('register', 'Backend\RegistrationController@store');
Route::get('login', 'Backend\SessionsController@create')->name('home');
Route::post('login', 'Backend\SessionsController@store');
Route::post('logout', 'Backend\SessionsController@destroy');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('backend/indexuser', 'Backend\UserController@getIndex');
Route::get('backend/adduser', 'Backend\UserController@getAdd');
Route::post('backend/adduser', 'Backend\UserController@store');
Route::get('backend/indexuser/delete/{id}', 'Backend\UserController@getDelete');

Route::get('backend/indexcategory', 'Backend\CategoryController@getIndex');
Route::get('backend/addcategory', 'Backend\CategoryController@getAdd');
Route::post('backend/addcategory', 'Backend\CategoryController@postAdd');
Route::get('backend/editcategory/{id}', 'Backend\CategoryController@getEdit');
Route::post('backend/editcategory/{id}', 'Backend\CategoryController@postEdit');
Route::get('backend/indexcategory/delete/{id}', 'Backend\CategoryController@getDelete');

Route::get('backend/indexarticle', 'Backend\ArticleController@getIndex');
Route::get('backend/addarticle', 'Backend\ArticleController@getAdd');
Route::post('backend/addarticle', 'Backend\ArticleController@postAdd');
Route::get('backend/editarticle/{id}', 'Backend\ArticleController@getEdit');

Route::post('backend/editarticle/{id}', 'Backend\ArticleController@postEdit');
Route::get('backend/indexarticle/delete/{id}', 'Backend\ArticleController@getDelete');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
