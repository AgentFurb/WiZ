@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col order-1 shop-bar">
                <select class="form-control category" aria-label="Select category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 

                <form class="Sbar" action="/overzicht" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col order-2 shop-bar">
                {{-- <form class="Sbar" action="/overzicht" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form> --}}
            </div>
            <div class="col order-12 shop-bar addcol">
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
            <div class="col pagetitle"> 
                <h2>Product toevoegen</h2>
            </div>
            <div class="col">
            {{-- <div class="btn-floating-container">
                <button class="btn-floating btn btn-primary btn-medium"><i class="fa fa-barcode " aria-hidden="true"></i>
                </button>
            </div> --}}
            </div>
        </div>
        
        {{-- TEST --}}
        <style>
            /* In order to place the tracking correctly */
            canvas.drawing, canvas.drawingBuffer {
                position: absolute;
                left: 0;
                top: 0;
            }
        </style>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-btn"> 
                        {{-- <button class="btn btn-scan" type="button" id="btn" value="Start/Stop the scanner" data-toggle="modal" data-target="#livestream_scanner">
                            <i class="fa fa-barcode"></i>
                        </button>  --}}
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="modal" id="livestream_scanner">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Barcode Scanner</h4>
                        <button type="button" id="btn" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>                        
                    </div>
                    <div class="modal-body">
                        <div id="interactive" class="viewport"></div>
                        <div class="error"></div>
                        <div id="scanner-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button id="scanclose" value="Start/Stop the scanner" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{-- <div id="scanner-container"></div>
        <input type="button" id="btn" value="Start/Stop the scanner" />
        <div id="interactive" class="viewport"></div> --}}

        <script>     
                function startScanner() {
                    Quagga.init({
                        inputStream: {
                            name: "Live",
                            type: "LiveStream",
                            target: document.querySelector('#scanner-container'),
                            constraints: {
                                width: 480,
                                height: 320,
                                facingMode: "environment"
                            },
                        },
                        decoder: {
                            readers: [
                                "code_128_reader",
                                "ean_reader",
                                "ean_8_reader",
                                "code_39_reader",
                                "code_39_vin_reader",
                                "codabar_reader",
                                "upc_reader",
                                "upc_e_reader",
                                "i2of5_reader"
                            ],
                            debug: {
                                showCanvas: true,
                                showPatches: true,
                                showFoundPatches: true,
                                showSkeleton: true,
                                showLabels: true,
                                showPatchLabels: true,
                                showRemainingPatchLabels: true,
                                boxFromPatches: {
                                    showTransformed: true,
                                    showTransformedBox: true,
                                    showBB: true
                                }
                            }
                        },
        
                    }, function (err) {
                        if (err) {
                            console.log(err);
                            return
                            Quagga.initialized = true;
                            Quagga.start();
                        }
        
                        console.log("Initialization finished. Ready to start");
                        Quagga.start();
        
                        // Set flag to is running
                        _scannerIsRunning = true;
                    });
        
                    Quagga.onProcessed(function (result) {
                        var drawingCtx = Quagga.canvas.ctx.overlay,
                        drawingCanvas = Quagga.canvas.dom.overlay;
        
                        if (result) {
                            if (result.boxes) {
                                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                                result.boxes.filter(function (box) {
                                    return box !== result.box;
                                }).forEach(function (box) {
                                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                                });
                            }
        
                            if (result.box) {
                                Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
                            }
        
                            if (result.codeResult && result.codeResult.code) {
                                Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
                            }
                        }
                    });
                    function order_by_occurrence(arr) {
                        var counts = {};
                        arr.forEach(function(value){
                            if(!counts[value]) {
                                counts[value] = 0;
                            }
                            counts[value]++;
                        });

                        return Object.keys(counts).sort(function(curKey,nextKey) {
                            return counts[curKey] < counts[nextKey];
                        });
                    }
                    var last_result = [];
                    Quagga.onDetected(function (result) {
                        var last_code = result.codeResult.code;
                        console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
                        last_result.push(last_code);
                        if (last_result.length > 20) {
                            code = order_by_occurrence(last_result)[0];
                            console.log(last_result);
                            last_result = [];
                            Quagga.stop();
                            $.ajax({
                                type: "POST",
                                url: '/products/get_barcode',
                                data: { upc: code }
                            });
                        }
                        
                    });
                }
        
        
                // Start/stop scanner
                document.getElementById("btn").addEventListener("click", function () {
                    startScanner();
                });

                document.getElementById("scanclose").addEventListener("click", function () {
                    Quagga.stop();
                });
            </script>

        {{-- END TEST  --}}
        <form action="/overzicht/nieuw/store" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row from-group">
                <div class="col-xl  form-group">
                    <h5>Product foto:</h5>
                    <div class="productphoto">
                        <img id="imgShop" src="" onerror=this.src="{{ url('/img/img-placeholder.png') }}" class="img-fluid" name="imagelink">
                        <br>
                        <input type="file" name="imagelink" onchange="previewFileShop()">
                    </div>

                    <h5>Product extra informatie:</h5>
                    <textarea class="form-control" rows="7" cols="50"  name="Specificaties"></textarea>
                </div>
                <div class="col-xl  form-group">
                    <h5>Product naam:</h5>
                    <input class="form-control" type="text" name="Productomschrijving" required/>
                    <h5>Productcode:</h5>
                    <input class="form-control" type="text" name="Productcodefabrikant" required/>
                    <h5>GTIN product:</h5>
                    <input class="form-control scanBtn" type="text" name="GTIN"/>
                    <button class="btn btn-scan" type="button" id="btn" value="Start/Stop the scanner" data-toggle="modal" data-target="#livestream_scanner">
                        <i class="fa fa-barcode"></i>
                    </button> 
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
                    <h5>Aantal:</h5>
                    <input class="form-control" type="text" name="Aantal" required/>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6 prodcreate">
                    {{-- @if(isset($errormessage1))
                        <div class="errormessage1"><h3>{{$errormessage1}}</h3></div><br>
                    @endif --}}
                    <input class="btn btn-lg" type="submit" value="Toevoegen"/>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
@endsection