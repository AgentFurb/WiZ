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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'PagesController@index');

Route::get('/register', 'PagesController@register')->name('register');

Route::get('/home', ['middleware' => 'auth', 'uses' => 'PagesController@home']);
// Route::get('/home', 'PagesController@home');

Route::get('/overons', ['middleware' => 'auth', 'uses' => 'PagesController@overons']);
// Route::get('/overons', 'PagesController@overons');

Route::get('/shop', ['middleware' => 'auth', 'uses' => 'PagesController@shop']);
// Route::get('/shop', 'PagesController@shop');

Route::get('/profiel', ['middleware' => 'auth', 'uses' => 'PagesController@profiel']);
// Route::get('/profiel', 'PagesController@profiel');

Route::get('/controlpanel', ['middleware' => 'auth', 'uses' => 'UsersController@control']);
// Route::get('/controlpanel', 'UsersController@control');

Route::get('/productdetail/products', ['middleware' => 'auth', 'uses' => 'ProductsController@productdetail']);
// Route::get('/productdetail', 'ProductsController@productdetail');


Route::get('/controlpanel/users/{user}', ['middleware' => 'auth', 'uses' => 'UsersController@show']);
// Route::get('/controlpanel/users/{user}', 'UsersController@show');

Route::get('/controlpanel/users/{user}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@edit');


Route::patch('/controlpanel/users/{user}/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@update');

// Route::delete('/controlpanel/users/{user}/destroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
// // Route::get('/controlpanel/users/{user}/edit', 'UsersController@destroy');


//Route::get('/home', 'HomeController@index')->name('home');

//ERROR MESSAGES

Route::get('401', ['as' => '401', 'uses' => 'ErrorController@notauthorized']);
Route::get('403', ['as' => '403', 'uses' => 'ErrorController@forbidden']);
Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('419', ['as' => '419', 'uses' => 'ErrorController@sessionexpired']);
Route::get('429', ['as' => '429', 'uses' => 'ErrorController@serverrequest']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
Route::get('503', ['as' => '503', 'uses' => 'ErrorController@maintenance']);

Route::get('/searchindex','SearchController@searchindex');

Route::get('/search','SearchController@search');