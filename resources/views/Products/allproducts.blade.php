@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row justify-content-end" id="Searchnavbar"> 
            <div class="col-5 shop-bar">
                <select class="form-control category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($productcats as $productcat)
                        <option value="/shop/products/{{ $productcat->Productserie }}">{{ $productcat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="row justify-content-end" id="Searchnavbar"> 
                <div class="col-5 shop-bar">
                    <input type="search" class="form-control search" placeholder="Search" aria-label="Search" size="60" >
                </div>
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
{{-- @if (isset($categorieProds))
        @foreach ($categorieProds as $categorieProd)
            <li>test</li>
        @endforeach

    @else
        <h1>Not found</h1>
    @endif --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection