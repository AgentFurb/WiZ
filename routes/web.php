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

Route::get('/home', 'PagesController@home');

Route::get('/overons', 'PagesController@overons');

Route::get('/shop', 'PagesController@shop');

Route::get('/profiel', 'PagesController@profiel');

Route::get('/controlpanel', 'PagesController@control');

//Route::get('/home', 'HomeController@index')->name('home');
