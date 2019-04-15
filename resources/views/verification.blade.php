@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <div class="text-center" style="height: 80vh;display: flex;align-items: center;justify-content: center" >
        <div>
            <h4>You need to verify your account to access this feature</h4>
            <p class="lead" >Check your mail and click the verification link</p>
            <p>Click <a href="{{ route('verification.resend') }}" style="text-decoration: underline" >HERE</a> to receive a new verification mail</p>
            <p ><a href="{{ \Illuminate\Support\Facades\URL::previous() }}" >Go back</a></p>
        </div>
    </div>
    @include('widgets.footer')
@endsection