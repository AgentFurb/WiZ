@extends('layouts.app')

@section('content')
    <div class="bg">
        <div class="layer">
            <div class="modal-dialog Boxlogin">
                <div class="modal-content">
                    <div class="modal-heading">
                        <h2 class="text-center">WiZ Kuijpers</h2>
                    </div>
                    <hr class="hr-login" />
                    <div class="modal-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        <script>
                                            $(document).ready(function(){
                                                $("#popup1").modal('show');

                                            });
                                        </script>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">                                 
                                    <input id="password" type="password" placeholder="Wachtwoord" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                    @if ($errors->has('password'))
                                        {{-- <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> --}}
                                        
                                        <script>
                                            $(document).ready(function(){
                                                $("#popup1").modal('show');

                                            });
                                        </script>
                                    @endif
                                </div>
                            </div>
                            <br>


                            <button type="submit" class="btn btn-lg" name="submit" id="myBtn" data-toggle="modal">
                                {{ __('Inloggen') }}
                            </button>


                                {{-- <a class="buttonlogin" href="#popup1">Let me Pop up</a> --}}


                            <br>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            <div class="foot">
                <div class="foot">© 2018 Copyright</div>
            </div>
        </div>
    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                Thank to pop me out of that button, but now i'm done so you can close this window.
            </div>
        </div>
    </div>
@endsection
