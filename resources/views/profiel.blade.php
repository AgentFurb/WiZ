@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />

@endsection
@section('content')
    <hr>
    <div class="container-fluid maincont">
        <div class="container-fluid col-menu">
            <div class="row upperside" id="UserInfo">
                <div class="col order-first">
                    <ul class="nav-fill">
                        <li class="nav-item text-center li-pad">
                            Email:<br />
                            {{ Auth::user()->email }}
                        </li>
                        <li class="nav-item text-center li-pad">
                            Naam:<br />
                            {{ Auth::user()->voornaam }} {{ Auth::user()->achternaam }}
                        </li>
                    </ul>
                </div>
                <div class="col order-last">
                    <ul class="nav-fill">
                        <li class="nav-item text-center li-pad">
                            Functie:<br />
                            {{ Auth::user()->rechten }}
                        </li>
                        <li class="nav-item text-center li-pad">
                            Vestiging:<br />
                            {{ Auth::user()->vestiging }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="editProfileImg mx-auto">
            <img alt="Avatar afbeelding" href="#" class="profile-img" src="/storage/avatars/{{ Auth::user()->avatar }}">
            <div class="overlay-profile">
                <a aria-label="Avatar wijzigen" href="#" class="icon-editProfile"  data-toggle="modal" data-target="#exampleModal"> 
                    <i class="fas fa-camera"></i>
                </a>
            </div>
        </div>
      
      
        
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4>Het in en uitgaan van uw producten</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                        <canvas id="bar-chart"  class="bar-chart" width="700" height="500"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="doughnut-chart"  class="doughnut-chart" width="700" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card profile-links">
                        <div class="card-body">
                            <a href="portal.office.com" rel="noopener" target="_blank"><h5 class="card-title"><img alt="Kuijpers logo" class="kuijpers-icon" src="img/kuijpers-icon.png">Mijn Kuijpers</h5></a>        
                            @if (auth()->check())
                                @if ('Auth::user()->rechten' == 'User')

                                @else
                                    <a class="controlmobile" href="/controlpanel"><h5 class="card-title"><i class="fas fa-user-cog lineheight"></i>Controlpanel</h5></a>
                                @endif
                            @endif
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form-profiel').submit();"><h5 class="card-title"><i class="fas fa-power-off lineheight"></i>Uitloggen</h5>

                            <form alt="logout" id="logout-form-profiel" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>    
                            </a>                    
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>  
        </div> 
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Avatar wijzigen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="mx-auto">
                <img id="img" class="img-preview" src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Image preview...">
            </div>
            <div class="modal-body">
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" onchange="previewFile()">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
            </div>
        </div>
    </div>
</div>

    @section('charts')
        <script src="{{ asset('js/raphael-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/justgage.js') }}"></script>
        <script src="{{ asset('js/pie.js') }}"></script>
        <script src="{{ asset('js/Chart.js') }}"></script>

        <script src="{{ asset('js/Charts.js') }}"></script>
    @endsection
@endsection