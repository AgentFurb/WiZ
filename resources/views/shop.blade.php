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
            <div class="col-5 shop-bar">
                <form action="/overzicht/products/allproducts" method="POST" role="search">
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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 mainshopprods">
            <h3>Onlangs toegevoegd:</h3>
            <div class="card-group">
                @if (isset($productsOTs))
                    @foreach ($productsOTs as $productsOT)
                        <div class="card">
                            <img class="card-img-top " src="{{$productsOT->imagelink}}" alt="Card image cap" height="300px" width="300px">
                            <div class="card-body">
                                <a href="/overzicht/productdetail/{{$productsOT->Productcode}}" class="card-link"><h5 class="card-title">{{$productsOT->Productomschrijving}}</h5></a>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                            </div>
                        </div>
                    @endforeach
                @else 
                <h1>not set</h1>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <ul class="list-unstyled">
                <li class="media">
                    <h3 class="mt-0 mb-1">Eerder bekeken:</h3>
                </li>
                <li class="media">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="#" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
                <li class="media my-4">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="#" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="#" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid bekijkook">
    <h3>Bekijk ook deze producten:</h3>
    <div class="row">
        @if (isset($bekijkook))
            @foreach ($bekijkook as $bekijk)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img class="card-img-top productdetailimage" src="{{ $bekijk->imagelink}}" alt="Card image cap" />
                        <div class="card-body">
                                <a href="/overzicht/productdetail/{{$productsOT->Productcode}}" class="card-link"><h5 class="card-title">{{ $bekijk->productomschrijving}}</h5></a>
                            <p class="card-text">If your canoe is stuck in a tree with the headlights on, how many pancakes does it take to get to the moon?</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else 
            <h1>not set</h1>
        @endif       
    </div>
</div>
@endsection