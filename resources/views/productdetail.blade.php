@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/shop.css') }}" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end" id="Searchnavbar"> 
            <div class="col-5 shop-bar">
                <select class="form-control category">
                    <option value="" disabled selected hidden>Categorieën</option>
                    <option>Verwarmingen</option>
                    <option>Waterleidingen</option>
                    <option>Zonnepanelen</option>
                    <option>CV-Ketel's</option>
                    <option>Airconditioner's</option>
                </select> 
            </div>
            <div class="col-5 shop-bar">
                <input type="search" class="form-control search" placeholder="Search" aria-label="Search" size="60" >
            </div>
            <div class="col-2 shop-bar">
                @if ('{{ Auth::user()->Rechten }}' == 'User')
                    <div class="dropdown">
                        <img  class="dropbtn" src="img/setting2.png"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                        </div>
                    </div>
                @else   
                    <div class="dropdown">
                        <img  class="dropbtn" src="img/setting2.png"/>
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
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="img/shop_item2.jpg" id="myImg" class="productImg img-fluid"/>
            </div>
            <div class="col">
                {{-- <h1> {{ App::product()->productcode }}</h1> --}}
                <br>
                <h5><b>Product informatie: </b></h5>
                Vestiging:  <br>
                Aantal op voorraad:      <br><br>
                <h5><b>Omschrijving</b></h5>
                <p>{{ $product->Productomschrijving }}</p>
            </div>
        </div>
    </div>

@endsection