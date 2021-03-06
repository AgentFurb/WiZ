<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cat;
use App\GTIN;
use App\Pimage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image; 


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shopindex()
    {
        //Producten onlangs toegevoegd
        $productsOTs = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink',  'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal')
        ->orderBy('ingangsdatum', 'desc')
        ->limit(3)
        ->get();

        //Producten categorieën combobox  
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();

        //Bekijk ook
        $bekijkook = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink',  'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal')
        ->orderByRaw("RAND()")
        ->limit(4)
        ->get();

        // Producttype
        // $typen = DB::table('overzicht')->select('Producttype')->orderByRaw("RAND()")->limit(1)->get();

        //Producten met zelfde producttype
        $producttypes = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink',  'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal')
        ->where('o.Producttype', '=', 'Laptop')
        ->orderByRaw("RAND()")
        ->limit(3)
        ->get();

        // dd($producttypes);
  
        return view('shop', compact('combocats', 'productsOTs', 'bekijkook', 'producttypes'));
    }

    public function productdetail(String $product)
    {   
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();

        $productdetail = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Eenheid gewicht as gewicht','o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink', 'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal', 'o.Pspecificaties as specs')
        ->where('Productcode fabrikant', '=', $product)
        ->limit(1)
        ->get();

        return view('Products.productdetail', compact('combocats', 'productdetail'));
    }

    public function shopCat(String $cat)
    {
        // Combobox items Cats
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();
        // Products from category
        $prodscats = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink',  'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal')
        ->where('productserie', '=', $cat)
        ->simplePaginate(15);

        return view('Products.allproducts', compact('combocats', 'prodscats'));
    }

    public function producttoevoegen()
    {
        // Combobox items Cats
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();
        return view('Products.newproduct', compact('combocats'));
    }

    public function destroy(String $product)
    {
        $deleteproduct = Product::where('Productcode fabrikant', '=', $product)->delete();

        return redirect('/overzicht');
    }

    public function GTIN(String $GTIN)
    {
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();

        $gtininfo = DB::table('products as p')
        ->select('p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as gtin','p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Eenheid gewicht as gewicht','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving',  'p.Producttype as producttype')
        ->where('GTIN product', $GTIN)
        ->get();

        if(count($gtininfo) > 0)
        {
            return view('Products.newproduct', compact('gtininfo', 'combocats'));
        }
        else
        {
            $gtinerror = 'notfound';
            return view('Products.newproduct', compact('gtinerror', 'combocats'));
        }

        // dd($GTIN, $gtininfo);
    }

    public function update(Request $request)
    {


        // $product = Product::where('Productcode fabrikant', $request->Productcodefabrikant);
        $product = DB::table('overzicht as o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Eenheid gewicht as gewicht','o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink', 'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal', 'o.Pspecificaties as specs')
        ->where('Productcode fabrikant', $request->Productcodefabrikant)
        ->first();

        $product["Productcode fabrikant"] = $request->input("Productcodefabrikant");
        $product["GTIN product"] = $request->input("GTIN");
        $product->Productomschrijving = $request->input("Productomschrijving");
        $product->Locatie = $request->input("Locatie");
        $product->Fabrikaat = $request->input("Fabrikaat");
        $product->Pspecificaties = $request->input("Specificaties");
        $product->Productserie = $request->input("Productserie");
        $product->Producttype = $request->input("Producttype");
        $product["Eenheid gewicht"] = $request->input("Eenheidgewicht");
        $product->Aantal = $request->input("Aantal");
        $product->Ingangsdatum = date('Y-m-d H:i:s');
        
        $request->validate(['imagelink' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7500',]);
        $imagelinkName = '/storage/productimages/'.request()->imagelink->getClientOriginalName();
        $destinationPath = public_path('/storage/productimages');
        $request->imagelink->move($destinationPath, $imagelinkName);
        $product->imagelink = $imagelinkName;
        $product->save();

        return redirect('/overzicht');
    }


    public function editproduct(String $product)
    {
        $combocats = DB::table('overzicht')->distinct()->select('Productserie', 'Productserie')->get();

        $productedit = DB::table('overzicht AS o')
        ->select('o.ID as id', 'o.Productcode fabrikant as productcodefabrikant', 'o.Fabrikaat as fabrikaat', 'o.Productserie as productserie', 'o.Eenheid gewicht as gewicht','o.Ingangsdatum as ingangsdatum', 'o.Productomschrijving as productomschrijving', 'o.imagelink as imagelink', 'o.Locatie as locatie', 'o.Producttype as producttype', 'o.Aantal as aantal', 'o.Pspecificaties as specs')
        ->where('Productcode fabrikant', '=', $product)
        ->limit(1)
        ->get();

        // dd($productedit);
        return view('Products.editproduct', compact('combocats', 'productedit'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'Productcodefabrikant' => ['required', 'string', 'max:255'],
            'GTIN' => ['nullable', 'string', 'max:255'],
            'Productomschrijving' => ['required', 'string', 'max:255'],
            'Locatie' => ['required', 'string', 'max:255'],
            'Fabrikaat' => ['required', 'string', 'max:255'],
            'Specificaties' => ['nullable', 'string', 'max:255'],
            'Productserie' => ['required', 'string', 'max:255'],
            'Producttype' => ['required', 'string', 'max:255'],
            'Eenheidgewicht' => ['nullable', 'string', 'max:255'],
            'Aantal' => ['nullable', 'string', 'max:255'],
        ]);

        $product = new Product();
        $product["Productcode fabrikant"] = $request->input("Productcodefabrikant");
        $product->Productomschrijving = $request->input("Productomschrijving");
        $product->Locatie = $request->input("Locatie");
        $product->Fabrikaat = $request->input("Fabrikaat");
        $product->Pspecificaties = $request->input("Specificaties");
        $product->Productserie = $request->input("Productserie");
        $product->Producttype = $request->input("Producttype");
        $product->Ingangsdatum = date('Y-m-d H:i:s');

        if(empty($request->input("Eenheidgewicht"))){
            $product["Eenheid gewicht"] = "Onbekend";
        }
        else{
            $product["Eenheid gewicht"] = $request->input("Eenheidgewicht");
        }
        if(empty($request->input("Aantal"))){
            $product->Aantal = "Onbekend";
        }
        else{
            $product->Aantal = $request->input("Aantal");
        }
        
        if (empty($request->imagelink)) {
            $product->imagelink = "/img/img-placeholder.png	";
        } else {
            // $request->validate(['imagelink' => 'image|mimes:jpeg,png,jpg,gif,svg|max:7500',]);
            // $imagelinkName = '/storage/productimages/'.request()->imagelink->getClientOriginalName();
            
            // $destinationPath = public_path('/storage/productimages');
            // $request->imagelink->move($destinationPath, $imagelinkName);
            // $product->imagelink = $imagelinkName;


            $request->validate(['imagelink' => 'image|mimes:jpeg,png,jpg,gif,svg|max:7500',]);
            $imagelinkName = '/storage/productimages/'.request()->imagelink->getClientOriginalName();
            
            $destinationPath = public_path('/storage/productimages');
            $request->imagelink->move($destinationPath, $imagelinkName);
            $product->imagelink = $imagelinkName;

        }
        $product->save();
        return redirect('/overzicht');
    }

}
