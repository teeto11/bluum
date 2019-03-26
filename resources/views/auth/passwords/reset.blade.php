@php $title = "Reset Password" @endphp
@extends('layouts.app-temp')

@section('content')
@include('widgets.top-nav-bar')
<div class="forgotten-password">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="forgot-card">
                    <div class="forgot-header">
                        <h5><img src="/images/bloom.png" width="50" alt=""> Bluumhealth</h5>
                    </div>
                    <div class="forgot-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="token" value="{{ $token }}">
                            </div>
    
                            <div class="form-group">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="button">
                                {{ __('Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('widgets.footer')
@endsection
