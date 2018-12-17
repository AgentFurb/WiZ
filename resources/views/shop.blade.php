@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection
@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col-5 shop-bar">
                <select class="form-control category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-5 shop-bar">
                <input type="search" class="form-control search" placeholder="Search" aria-label="Search" size="60" >
            </div>
            <div class="col-2 shop-bar">
                @if ('{{ Auth::user()->Rechten }}' == 'User')      
                    <div class="dropdown">
                        <img  class="dropbtn" src="{{ asset('img/setting2.png') }}"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                        </div>
                    </div>
                @else   
                    <div class="dropdown">
                        <img  class="dropbtn" src="{{ asset('img/setting2.png') }}"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                            <a href="#"><i class="fas fa-wrench"></i>Aanpassen</a>
                            <a href="producten.php"><i class="fas fa-trash-alt"></i>Verwijderen</a>
                        </div>
                    </div>
                @endif
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
                            <img class="card-img-top " src="{{$productsOT->imagelink}}" alt="Card image cap" id="myshopmodal1" height="300px" width="300px">
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
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">If your canoe is stuck in a tree with the headlights on, how many pancakes does it take to get to the moon?</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">On a scale from one to ten what is your favourite colour of the alphabet.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">I stepped on a Corn Flake, now I'm a Cereal Killer</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">I stepped on a Corn Flake, now I'm a Cereal Killer</p>
                </div>
            </div>
        </div>         
    </div>
</div>
@endsection