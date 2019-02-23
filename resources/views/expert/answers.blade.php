@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="profile-wrapper" style="margin-top: 5rem">
            <div class="container profile-sub-wrapper">
                <div class="profile-sidebar">
                    <div class="edit-btn-wrapper">
                        <a href="edit-profile.html" class="edit-btn hvr-pulse" style=""><i class="fa fa-edit"></i>Edit</a>
                    </div>
                    <div class="profile-sidebar-header">
                        <img src="assets/images/fyuma.jpg" class="" alt="">
                        <p>AGBOMA FESTUS</p>
                    </div>
                    <div class="profile-sidebar-social hvr-float">
                        <div class="followers">
                            <p><i class="fa fa-users"></i> followers <br> <span>100</span></p>
                        </div>
                        <div class="post">
                            <p><i class="fa fa-sticky-note"></i> post <br> <span>100</span></p>
                        </div>
                    </div>
                    <div class="btn hvr-grow" style="">Follow <i class="fa fa-plus-circle"></i></div>
                    <div class="profile-sidebar-body">
                        <ul>
                            <li><b><i class="fa fa-briefcase"></i> Profession : </b>Medical Doctor</li>
                            <li><b><i class="fa fa-gears"></i> Work Experience : </b>9 years</li>
                            <li><b><i class="fa fa-home"></i> office : </b>Medical Doctor</li>
                            <li><b><a href="" style="color:rgba(0, 0, 0, 0.8); "><i class="fa fa-eye" style="padding:6px 5px"></i>View Posts</a></b></li>
                        </ul>
                    </div>
                </div>
                <div class="profile-main">
                    <section class="questions">
                        <div class="table-row">
                            <div class="table-responsive bg-white">
                                <h3 class="">Expert Responses</h3><hr>
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="" style="width:80%">Post Title</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Which movie have you watched most recently</td>
                                            <td><a href="view-post.html" class="" style="margin:0px 14px;"><i class="fa fa-eye text-light"></i></a> <a href="" class="" style="margin:0px 14px; color: crimson"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </section>	
                </div>
            </div>
        </div>
    @include('widgets.footer')
@endsection
