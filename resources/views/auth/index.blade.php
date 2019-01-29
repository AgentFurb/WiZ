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
                                    <input aria-label="E-mail adres" id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>                                    
                                </div>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">                                 
                                    <input aria-label="Wachtwoord" id="password" type="password" placeholder="Wachtwoord" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >                                   
                                </div>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('password') }}
                                    </div>
                                 @endif
                            </div>
                            <br>


                            <button aria-label="Inloggen" type="submit" class="btn btn-lg login" name="submit" id="myBtn" data-toggle="popup1">
                                {{ __('Inloggen') }}
                            </button>


                                {{-- <a class="buttonlogin" href="#popup1">Let me Pop up</a> --}}


                            <br>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link forgot" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            <div class="foot">
                <div class="foot">Kuijpers Installaties &copy; 2018</div>
            </div>
        </div>
    </div>
@endsection
