@php $title = 'Reset Password' @endphp
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="button">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </form>
                    </div>
                    <div class="forgot-footer">
                        <p>Do you remember your password? <a href="">Try logging in </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('widgets.footer')
@endsection
