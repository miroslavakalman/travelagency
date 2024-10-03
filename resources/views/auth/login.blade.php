@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" style="background: none;">
                        @csrf
                        <div class="card-header">{{ __('авторизация') }}</div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="e-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="пароль">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                

                        <div >
                            <div>
                                <button type="submit" class="btn-primary" style="margin: 0 auto;">
                                    {{ __('войти') }}
                                    
                                </button>
                                <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
                            </div>
                        </div>
                    </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
