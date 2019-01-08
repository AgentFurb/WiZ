<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cat;
use App\Pimage;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }

    public function shopindex()
    {
        //Producten onlangs toegevoegd
        $productsOTs = DB::table('productimages')->where('Afkorting', 'PPI')->orWhere('Productcode', '[0-9]+')->limit(3)->offset(83)->get();
        //Producten categorieën combobox  
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();
        //Bekijk ook
        $bekijkook = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Eenheid gewicht as gewicht','p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('Afkorting', '=', 'PPI')
        ->orderByRaw("RAND()")
        ->limit(4)
        ->get();

        //dump($bekijkook);

        return view('shop', compact('combocats', 'productsOTs', 'bekijkook'));
    }

    public function productdetail(String $product)
    {   
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();

        $productdetail = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Eenheid gewicht as gewicht','p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('Productcode fabrikant', '=', $product)
        ->limit(1)
        ->get();

        return view('Products.productdetail', compact('combocats', 'productdetail'));
    }

    public function shopCat(String $cat)
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        // Products from category
        $prodscats = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('productserie', '=', $cat)
        ->simplePaginate(15);
        // id
        // productcodefabrikant
        // GTIN
        // ingangsdatum
        // productomschrijving
        // fabrikaat
        // productserie
        // producttype
        // imagelink
        // afkorting
        return view('Products.allproducts', compact('combocats', 'prodscats'));
    }

    public function producttoevoegen()
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        return view('Products.newproduct', compact('combocats'));
    }

    public function destroy(String $product)
    {
        $deleteproduct = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->where('Productcode fabrikant', '=', $product)
        ->delete();
        
  

        return redirect('/overzicht');
    }

    public function store(Request $request)
    {
        // $pimage = Pimage::create(request(['imagelink', 'Productomschrijving', 'Productcode fabrikant']));

        // dd($request);
        //dd($request->imagelink->getClientOriginalName());
        if(empty($request->imagelink->getClientOriginalName()))
        {
            //no image
            $pimage = new Pimage();
            $pimage->Locatie = $request->input("Locatie");
            $pimage->Productcode = $request->input("Productcodefabrikant");
            $pimage->Productomschrijving = $request->input("Productomschrijving");
            $pimage->save();
        }
        else
        {
            $pimage = new Pimage();
            $request->validate(['imagelink' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $imagelinkName = '/storage/productimages/'.request()->imagelink->getClientOriginalName();
            $destinationPath = public_path('/storage/productimages');
            $request->imagelink->move($destinationPath, $imagelinkName);
            $pimage->imagelink = $imagelinkName;

            $pimage->Locatie = $request->input("Locatie");
            $pimage->Productcode = $request->input("Productcodefabrikant");
            $pimage->Productomschrijving = $request->input("Productomschrijving");
            $pimage->save();
        }


        $product = new Product();
        $product["Productcode fabrikant"] = $request->input("Productcodefabrikant");
        $product["GTIN product"] = $request->input("GTIN");
        $product->Productomschrijving = $request->input("Productomschrijving");
        $product->Locatie = $request->input("Locatie");
        $product->Fabrikaat = $request->input("Fabrikaat");
        $product->Productserie = $request->input("Productserie");
        $product->Producttype = $request->input("Producttype");
        $product["Eenheid gewicht"] = $request->input("Eenheidgewicht");
        $product->save();

        return redirect('/overzicht');
    }

}
