@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="notifications-wrapper-main" style="margin-top: 2rem" >
        <div class="container notifications-wrapper">
            <h4><i class="fa fa-exclamation-circle"></i> Notifications</h4>
            <hr>
            <style>
                #notifications{
                    height: 70vh;
                    overflow-y: auto;
                }
                #notifications ul{
                    list-style: circle;
                }
                #notifications ul li{
                    border-bottom: 1px solid #d7d7d7;
                    line-height: 5rem;
                }
                a, a:visited, a:active, a:link {
                    color: #2a2a2a;
                }
            </style>
            <div id="notifications" >
                <ul>
                    @foreach($notifications as $notification)
                        <li><a href="{{ $notification->link }}" ><p><i class="fa fa-circle" ></i> {!! $notification->notification !!}</p></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection