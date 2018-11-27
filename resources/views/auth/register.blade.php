@extends('layouts.app')

@section('content')
<div class="bg">
    <div class="layer">
        <div class="modal-dialog Box">
            <div class="modal-content">
                <div class="modal-heading">
                    <h2 class="text-center">Registreren</h2>
                </div>
                <hr class="hr-login" />
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Input Voornaam --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="voornaam" placeholder="Voornaam" type="text" class="form-control{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" value="{{ old('voornaam') }}" required autofocus>

                                    @if ($errors->has('voornaam'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('voornaam') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input Achternaam --}}
                            <div class="form-group row">                
                                    <div class="col-md-6">
                                        <input id="achternaam" placeholder="Achternaam" type="text" class="form-control{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ old('achternaam') }}" required autofocus>
        
                                        @if ($errors->has('achternaam'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('achternaam') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            {{-- Input Email --}}    
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="email" type="email"  placeholder="E-Mail Adres" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input Rechten --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="Rechten" type="Rechten" placeholder="Gebruikers rechten"  class="form-control{{ $errors->has('Rechten') ? ' is-invalid' : '' }}" name="Rechten" value="{{ old('Rechten') }}" required>

                                    @if ($errors->has('Rechten'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Rechten') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input Vestiging --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="Vestiging" type="Vestiging" placeholder="Vestiging"  class="form-control{{ $errors->has('Vestiging') ? ' is-invalid' : '' }}" name="Vestiging" value="{{ old('Vestiging') }}" required>

                                    @if ($errors->has('Vestiging'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Vestiging') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input Wachtwoord --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Wachtwoord"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input Wachtwoord confirm --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            {{-- Input Submit --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 regbtn">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">
            <div class="foot">© 2018 Copyright</div>
        </div>
    </div>
</div>
<H1>DAB</H1>
@endsection