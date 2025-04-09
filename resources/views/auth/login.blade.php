@extends('layouts.app')

<link rel="shortcut icon" href="{{asset('favicons/favicon.png')}}">
<style>
    body {
        background: url(../img/f-login.png) no-repeat center center fixed !important;
    }    
    b {
        color:#ffffff;
    }
    .login-logo {
        font-size: 5rem !important;
    }

    .card-header:first-child {
        font-weight: bold;
    } 
    .card {
        border-radius: 0 10em 0rem 11rem !important;
    }
    .btn.btn-primary{
        width: 169px !important;
        border-radius: 40px !important;
    }
    @media (min-width: 991px){
        .col-md-8 {
            max-width: 45% !important;
        }
        .card-header {
            width: 445px !important;
            border-radius: 0 40em 0rem 0 !important;
        }
        .col-md-6 {
            flex: 0 0 60% !important;
            max-width: 60% !important;
        } 
    }
</style>
@section('content')
<div class="container">
    <center><div class="login-logo"><b>Sixmab</b></div></center>    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido al Sistema</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ingresar') }}
                                    </button>
                                </div>
                            </div>
                            <br>                            
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </center>
                    </form>
                </div>    
            </div><div class="float-right" style="color: #ffffff; font-size: 20px;">{{ __('adminlte::adminlte.version') }} 2.0</div>
        </div>
    </div>
</div>
@endsection
