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
        <br>
        <div class="row">
            <div class="col">
                {{-- <h2> {{ $product->Productomschrijving }}</h2> --}}
            </div>
        </div>
        <hr id="userdetailline">
        <div class="row">
            <div class="col-7">
                {{-- <img src="{{ $productimagetest->imagelink }}" id="myImg" class="productImg img-fluid"/> --}}



                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($productimagetests as $productimagetest)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ $productimagetest->imagelink }}" alt="First slide">
                            </div>
                        @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
                </div>


            <div id="userdetailverticalline"></div>
            <div class="col">
                <br>
                <b>Productcode:</b><br><br>
                <b>Ingangsdatum:</b><br><br>
                <b>GTIN product:</b><br><br>
                <b>Fabikaat:</b><br><br>
                <b>Productserie:</b><br><br>
                <br><br>
            </div>
            <div class="col">
                <br>
                {{-- {{ $product->Productcode fabrikant"] }} <br><br> --}}
                {{-- {{ $product->Ingangsdatum }} <br><br> --}}
                {{-- {{ $product["GTIN product"] }}  <br><br> --}}
                {{-- {{ $product->Fabrikaat }} <br><br>
                {{ $product->Productserie }} <br><br> --}}
            </div>
        </div>
    </div>

@endsection