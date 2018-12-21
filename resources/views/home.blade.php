@extends('layouts.layout')
@section('pageSpecificCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homegraphs.css') }}" />
@endsection
@section('content')
    <div class="backgroundHome">
        <br>
        <div class="container-fluid">
            <div class="row">     
                <div class="col-sm">                        
                    <div class="card ot-product widthfixer">
                        <div class="card-body">  
                            <h5>Het in en uitgaan van producten</h5>
                            <canvas id="bar-chart" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm baro"> 
                    <div class="card ot-product widthfixer">
                        <div class="card-body">
                            <h5>Totaal aantal gebruikers</h5>
                            <div id="smallbuddy"></div>
                            <input type="hidden" id="smallbuddyusers" value="{{$smallfella}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm"> 
                    <div class="card ot-product widthfixer">
                        <div class="card-body">
                            <canvas id="doughnut-chart" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('charts')
        <script src="{{ asset('js/raphael-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/justgage.js') }}"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/Charts.js') }}"></script>
    @endsection
@endsection
