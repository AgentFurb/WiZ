<?php

use App\User;
use Illuminate\Support\Facades\Input;

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

Route::get('/register', ['middleware' => 'auth', 'uses' => 'PagesController@register']);

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

Route::get('/controlpanel/users/{user}/edit', ['middleware' => 'auth', 'uses' => 'UsersController@edit']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@edit');


Route::patch('/controlpanel/users/{user}/update', ['middleware' => 'auth', 'uses' => 'UsersController@update']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@update');

Route::delete('/controlpanel/users/{user}/destroy', ['middleware' => 'auth', 'uses' => 'UsersController@destroy']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@destroy');


//Route::get('/home', 'HomeController@index')->name('home');

//ERROR MESSAGES

Route::get('401', ['as' => '401', 'uses' => 'ErrorController@notauthorized']);
Route::get('403', ['as' => '403', 'uses' => 'ErrorController@forbidden']);
// Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('419', ['as' => '419', 'uses' => 'ErrorController@sessionexpired']);
Route::get('429', ['as' => '429', 'uses' => 'ErrorController@serverrequest']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
Route::get('503', ['as' => '503', 'uses' => 'ErrorController@maintenance']);

//new user

Route::get('/controlpanel/newuser', ['middleware' => 'auth', 'uses' => 'UsersController@newuser']);
Route::post('/controlpanel/newuser/store', ['middleware' => 'auth', 'uses' => 'UsersController@store']);
Route::get ( '/controlpanel', function () {
    return view ( 'controlpanel' );
} );

Route::any ( '/controlpanel', function () {
    $q = Input::get ( 'q' );
    $user = User::where ( 'voornaam', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'controlpanel' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'controlpanel' )->withMessage ( 'No Details found. Try to search again !' );
} );