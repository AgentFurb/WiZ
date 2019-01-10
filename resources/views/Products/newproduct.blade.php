@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col-2 shop-bar">
                <select class="form-control category" aria-label="Select category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-8 shop-bar">
                <form class="Sbar" action="/overzicht" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-2 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw" aria-label="Nieuw product toevoegen">
                        <i class="far fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col pagetitle"> <h2>Product toevoegen</h2></div>
            <div class="col"></div>
        </div>

            
        <form action="/overzicht/nieuw/store" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row from-group">
                <div class="col-xl  form-group">
                    <h5>Product foto:</h5>
                    <div class="productphoto">
                        <img id="imgShop" src="{{ asset('img/img-placeholder.png') }}" alt="" class="img-fluid" name="imagelink">
                        <br>
                        <input type="file" name="imagelink" onchange="previewFileShop()">
                    </div>
                    <h5>Productomschrijving:</h5>
                    <textarea class="form-control" rows="4" cols="50"  name="Productomschrijving" required></textarea>
                </div>
                <div class="col-xl  form-group">
                    <h5>Productcode:</h5>
                    <input class="form-control" type="text" name="Productcodefabrikant" required/>
                    <h5>GTIN product:</h5>
                    <input class="form-control" type="text" name="GTIN" required/>
                    <h5>Fabrikaat:</h5>
                    <input class="form-control" type="text" name="Fabrikaat" required/>
                    <h5>Productserie:</h5>
                    <input class="form-control" type="text" name="Productserie" required/>
                    <h5>Producttype:</h5>
                    <input class="form-control" type="text" name="Producttype" required/>
                    <h5>Locatie:</h5>
                    <input class="form-control" type="text" name="Locatie" required/>
                    <h5>Eenheid gewicht:</h5>
                    <input class="form-control" type="text" name="Eenheidgewicht" required/>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col prodcreate">
                    <input class="btn btn-lg" type="submit" value="Toevoegen"/>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
@endsection