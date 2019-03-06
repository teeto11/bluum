@extends('user.layout.profile')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <style>
        @media (max-width:1040px){
            .back-btn{
                position:absolute;
                top: 4%;
            }
        }
        @media (max-width:568px){
            .back-btn{
                position:absolute;
                top: 4%;
            }
        }
        @media (max-width:532px){
            .back-btn{
                position:absolute;
                top: 5%;
                left:5%;
            }
            .questions{
                padding:0px !important;
                box-shadow:2px 2px 5px rgb(165, 165, 165) !important;
            }
            td{
                padding:15px 5px !important;
            }
        }
    </style>
@endsection

@section('profile-main')
<section class="questions">
<div style="padding-left: 2rem" >
            <a href="" class="back-btn" ><i class="fa fa-arrow-left" ></i></a>
        </div>
    <div class="table-row">
        <div class="table-responsive bg-white">
            <h3 class="">User Responses</h3><hr>
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
@endsection