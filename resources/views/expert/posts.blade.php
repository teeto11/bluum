@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('contnt')
    @include('widgets.top-nav-bar')
    <div class="expert-posts-wrapper">
        <div class="container post-sub-wrapper">
            
        </div>
    </div>
    @include('widgets.footer')
@endsection