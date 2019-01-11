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
            <div class="col-5 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw" aria-label="Nieuw product toevoegen">
                        <img src="{{ asset('img/newproduct.png') }}" alt="" height="50px" width="50px">
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
                            <img class="card-img-top " src="{{$productsOT->imagelink}}" onerror=this.src="{{ url('/img/img-placeholder.png') }}" height="300px" width="300px">
                            <div class="card-body">
                                <a href="/overzicht/productdetail/{{$productsOT->productcodefabrikant}}" class="card-link"><h5 class="card-title">{{$productsOT->productomschrijving}}</h5></a>
                                <ul style="list-style-type:square">
                                    <li class="productinfoshopindex"><p >{{$productsOT->locatie}}</p></li>
                                    <li class="productinfoshopindex"><p>{{$productsOT->ingangsdatum}}</p></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else 
                <h1>not set</h1>
                @endif
            </div>
        </div>
        {{-- <div class="list-group">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </div>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </div> --}}
        
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