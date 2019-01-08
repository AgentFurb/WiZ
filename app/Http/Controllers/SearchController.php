<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
use Illuminate\Support\Facades\Input;

use DB;

class SearchController extends Controller
{
    public function searchindex()
    {
        $users = User::all();

        return view('search.search', compact('users'));
    }

    // public function search(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $output="";
    //         $users=DB::table('users')->where('email', 'like','%' .$request->search. "%")->get();
    //         if($users)
    //         {
    //             foreach ($users as $key => $user) 
    //             {
    //                 $output.=
    //                 '<a href="/controlpanel/users/'.$user->id.'">'.
    //                 '<div class="row users usersdata">'.
    //                 '<div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>'.
    //                 '<div class="col-4">'.$user->email.'</div>'.
    //                 '<div class="col">'.$user->rechten.'</div>'.
    //                 '<div class="col">'.$user->vestiging.'</div>'.
    //                 '<div class="col">'.$user->id.'</div>'.
    //                 '</div>'.
    //                 '</a>';
    //             }
    //         return Response($output);
    //         }
    //     }
    // }


    public function SearchProducts()
    {
        $q = Input::get ( 'q' );
        // $products = Product::where ( 'Productomschrijving', 'LIKE', '%' . $q . '%' )->paginate(16);
    
        $products = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('p.productomschrijving', 'LIKE', '%' . $q . '%')
        ->simplePaginate(15);
    
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        return view ( 'products.allproducts', compact('products', 'q', 'combocats'));
    }
}
