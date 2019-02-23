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
                    <img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($expert->firstname)).'.svg' }}" class="" alt="">
                    <p>AGBOMA FESTUS</p>
                </div>
                <div class="profile-sidebar-social hvr-float">
                    <div class="followers">
                        <p><i class="fa fa-users"></i> Followers <br> <span>{{ $totalFollowers }}</span></p>
                    </div>
                    <div class="post">
                        <p><i class="fa fa-sticky-note"></i> Post <br> <span>{{ $totalPost }}</span></p>
                    </div>
                </div>
                @if(auth()->user() && auth()->user()->id == $expert->id)
                    <div class="text-center" style="margin-top: 1rem">
                        <a href="{{ route('expert.edit') }}" class="edit-btn hvr-pulse" style=""><i class="fa fa-edit"></i> Edit</a>
                    </div>
                @else
                    <div class="btn hvr-grow" style="">Follow <i class="fa fa-plus-circle"></i></div>
                @endif
                <div class="profile-sidebar-body">
                    <ul>
                        <li><b><i class="fa fa-briefcase"></i> Profession : </b>{{ ucwords($personalInfo->expertise) }}</li>
                        <li><b><i class="fa fa-gears"></i> Work Experience : </b>{{ $personalInfo->experience }}{{ ($personalInfo->experience > 1) ? 'Years' : 'Year' }}</li>
                    </ul>
                </div>
            </div>
            <div class="profile-main">
                @yield('profile-main')
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection