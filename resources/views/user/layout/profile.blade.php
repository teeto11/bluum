@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="profile-wrapper" style="margin-top: 5rem" >
        <div class="container profile-sub-wrapper">
            <div class="profile-sidebar">
                <div class="profile-sidebar-header">
                    <img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($user->firstname)).'.svg' }}" class="" alt="">
                    <p>{{ ucwords($user->firstname.' '.$user->lastname) }}</p>
                </div>
                <div class="profile-sidebar-social hvr-float">
                    <div class="followers">
                        <p><i class="fa fa-users"></i> Following <br> <span>{{ $following }}</span></p>
                    </div>
                    <div class="post">
                        <p><i class="fa fa-sticky-note"></i> Questions <br> <span>{{ $totalQuestions }}</span></p>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 1rem">
                    <a href="{{ route('user.showeditform') }}" class="edit-btn hvr-pulse" style=""><i class="fa fa-edit"></i> Edit</a>
                </div>
            </div>
            <div class="profile-main">
                @yield('profile-main')
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection