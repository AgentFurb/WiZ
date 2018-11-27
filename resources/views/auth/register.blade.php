@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Input Voornaam --}}
                        <div class="form-group row">
                            <label for="voornaam" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>
                            <div class="col-md-6">
                                <input id="voornaam" type="text" class="form-control{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" value="{{ old('voornaam') }}" required autofocus>

                                @if ($errors->has('voornaam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input Achternaam --}}
                        <div class="form-group row">
                                <label for="achternaam" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>
    
                                <div class="col-md-6">
                                    <input id="achternaam" type="text" class="form-control{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ old('achternaam') }}" required autofocus>
    
                                    @if ($errors->has('achternaam'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('achternaam') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- Input Email --}}    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input Rechten --}}
                        <div class="form-group row">
                            <label for="Rechten" class="col-md-4 col-form-label text-md-right">{{ __('Gebruikers rechten') }}</label>

                            <div class="col-md-6">
                                <input id="Rechten" type="Rechten" class="form-control{{ $errors->has('Rechten') ? ' is-invalid' : '' }}" name="Rechten" value="{{ old('Rechten') }}" required>

                                @if ($errors->has('Rechten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Rechten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input Vestiging --}}
                        <div class="form-group row">
                            <label for="Vestiging" class="col-md-4 col-form-label text-md-right">{{ __('Vestiging') }}</label>
                            <div class="col-md-6">
                                <input id="Vestiging" type="Vestiging" class="form-control{{ $errors->has('Vestiging') ? ' is-invalid' : '' }}" name="Vestiging" value="{{ old('Vestiging') }}" required>

                                @if ($errors->has('Vestiging'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Vestiging') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input Wachtwoord --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input Wachtwoord confirm --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{-- Input Submit --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
</div>
@endsection
