<?php

use App\User;
use App\Product;
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

Route::get('/overons', ['middleware' => 'auth', 'uses' => 'PagesController@overons']);
// Route::get('/overons', 'PagesController@overons');

Route::get('/profiel', ['middleware' => 'auth', 'uses' => 'UsersController@profiel']);
// Route::get('/profiel', 'PagesController@profiel');

Route::get('/controlpanel', ['middleware' => 'auth', 'uses' => 'UsersController@control']);
// Route::get('/controlpanel', 'UsersController@control');

Route::get('/controlpanel/users/{user}', ['middleware' => 'auth', 'uses' => 'UsersController@show']);
// Route::get('/controlpanel/users/{user}', 'UsersController@show');

Route::get('/controlpanel/users/{user}/edit', ['middleware' => 'auth', 'uses' => 'UsersController@edit']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@edit');


Route::patch('/controlpanel/users/{user}/update', ['middleware' => 'auth', 'uses' => 'UsersController@update']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@update');

Route::delete('/controlpanel/users/{user}/destroy', ['middleware' => 'auth', 'uses' => 'UsersController@destroy']);
// Route::get('/controlpanel/users/{user}/edit', 'UsersController@destroy');


//ERROR MESSAGES

Route::get('401', ['as' => '401', 'uses' => 'ErrorController@notauthorized']);
Route::get('403', ['as' => '403', 'uses' => 'ErrorController@forbidden']);
Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('419', ['as' => '419', 'uses' => 'ErrorController@sessionexpired']);
Route::get('429', ['as' => '429', 'uses' => 'ErrorController@serverrequest']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
Route::get('503', ['as' => '503', 'uses' => 'ErrorController@maintenance']);

//new user

Route::get('/controlpanel/newuser', ['middleware' => 'auth', 'uses' => 'UsersController@newuser']);
Route::post('/controlpanel/newuser/store', ['middleware' => 'auth', 'uses' => 'UsersController@store']);


Route::any ( '/controlpanel', function () {
    $currentuser = Auth::user()->rechten;
    $q = Input::get ( 'q' );
    $users = User::where ( 'voornaam', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate(10);


    if($currentuser == 'Admin'){
        $accountbeheertoegang = $currentuser;
        if (count ( $users ) > 0){
            return view ('controlpanel', compact('users', 'q', 'accountbeheertoegang'));
        }
        else {
           
        }
    }
    else{
        //als de gebruiker geen admin is wordt 'accountbeheertoegang' niet gezet, nu is alleen productbeer te zien
        return view ( 'controlpanel', compact('user', 'q'));
    }

} );


Route::any ( '/overzicht', function () {
    $u = Input::get ( 'u' );

    $product = Product::where ( 'Productomschrijving', 'LIKE', '%' . $u . '%' )->orWhere ( 'Productcode fabrikant', 'LIKE', '%' . $u . '%' )->paginate(16);
    if (count ( $product ) > 0)
        //dd($product);
        return view ( 'Products.allproducts' )->withDetails ( $product )->withQuery ( $u );
    else
        return view ( 'Products.allproducts' )->withMessage ( 'No Details found. Try to search again !');
} );

Route::get('/profile', 'UsersController@profilepic');
Route::post('/profile', 'UsersController@update_avatar');


Route::get('/overzicht', ['middleware' => 'auth', 'uses' => 'ProductsController@shopindex']);
//shop producttoevoegen
Route::get('/overzicht/nieuw', ['middleware' => 'auth', 'uses' => 'ProductsController@producttoevoegen']);
Route::post('/overzicht/nieuw/store', ['middleware' => 'auth', 'uses' => 'ProductsController@store']);

//shop categorie
Route::get('/overzicht/products/{cat}',  ['middleware' => 'auth', 'uses' =>'ProductsController@shopCat']);
//shop product detail
Route::get('/overzicht/productdetail/{product}', ['middleware' => 'auth', 'uses' => 'ProductsController@productdetail']);