@extends('layouts.layout')
@section('pageSpecificCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homegraphs.css') }}" />
@endsection
@section('titlePage')
    <title>WiZ Kuijpers</title>
@endsection
@section('content')
    <div class="backgroundHome">
        <br>
        <div class="container-fluid">
            <div class="row">     
                <div class="col-sm">                        
                    <div class="card ot-product widthfixer">
                        <div class="card-body">  
                            <h5>Het totaal aantal producten</h5>
                            <canvas id="bar-chart" width="300" height="300"></canvas>
                            <input type="hidden" id="countproducts" value="{{$barchartproducts}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm baro"> 
                    <div class="card ot-product widthfixer">
                        <div class="card-body">
                            <h5>Totaal aantal gebruikers</h5>
                            <div id="smallbuddy" class="usercounter"></div>
                            <input type="hidden" id="smallbuddyusers" value="{{$smallfella}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm"> 
                    <div class="card ot-product widthfixer">
                        <div class="card-body">
                            <h5>Vestigingen met het meest aantal producten</h5>
                            <canvas id="doughnut-chart" width="300" height="300"></canvas>
                            {{-- Doughnut locaties --}}
                            <input type="hidden" id="Locatie0" value="{{ (empty($piechartlocatie[0]->Locatie)) ? '' : $piechartlocatie[0]->Locatie }}">
                            <input type="hidden" id="Locatie1" value="{{ (empty($piechartlocatie[1]->Locatie)) ? '' : $piechartlocatie[1]->Locatie }}">
                            <input type="hidden" id="Locatie2" value="{{ (empty($piechartlocatie[2]->Locatie)) ? '' : $piechartlocatie[2]->Locatie }}">
                            <input type="hidden" id="Locatie3" value="{{ (empty($piechartlocatie[3]->Locatie)) ? '' : $piechartlocatie[3]->Locatie }}">
                            <input type="hidden" id="Locatie4" value="{{ (empty($piechartlocatie[4]->Locatie)) ? '' : $piechartlocatie[4]->Locatie }}">
                            {{-- Doughnut producten per locatie --}}
                            <input type="hidden" id="prodperlocatie0" value="{{ (empty($piechartlocatie[0]->LocatieAantal )) ? '' : $piechartlocatie[0]->LocatieAantal }}">
                            <input type="hidden" id="prodperlocatie1" value="{{ (empty($piechartlocatie[1]->LocatieAantal )) ? '' : $piechartlocatie[1]->LocatieAantal }}">
                            <input type="hidden" id="prodperlocatie2" value="{{ (empty($piechartlocatie[2]->LocatieAantal )) ? '' : $piechartlocatie[2]->LocatieAantal }}">
                            <input type="hidden" id="prodperlocatie3" value="{{ (empty($piechartlocatie[3]->LocatieAantal )) ? '' : $piechartlocatie[3]->LocatieAantal }}">
                            <input type="hidden" id="prodperlocatie4" value="{{ (empty($piechartlocatie[4]->LocatieAantal )) ? '' : $piechartlocatie[4]->LocatieAantal }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('PWA')
        <div>
            <img id="btnAdd" alt="PWA popup" src="{{ asset('img/pwa-icon.png') }}">
        <div>
    @endsection
    @section('charts')
        <script src="{{ asset('js/raphael-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/justgage.js') }}"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/Charts.js') }}"></script>
    @endsection
@endsection
