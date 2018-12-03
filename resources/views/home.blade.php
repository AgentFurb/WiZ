@extends('layouts.layout')
@section('pageSpecificCSS')
    <link rel="stylesheet" type="text/css" href="{{ url('../css/homegraphs.css') }}" />
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
                            <h5>Aantal inkomende producten</h5>
                            <a href="#" id="smallbuddy_refresh">Random Refresh</a>
                            <div id="smallbuddy"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm"> 
                    <div class="card ot-product widthfixer">
                        <div class="card-body">
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
