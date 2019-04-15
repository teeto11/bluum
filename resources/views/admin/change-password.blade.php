@extends('layouts.admin')

@section('content')

    @php
        //Name of input for change password form
        //old_password
        //new_password
        //new_password_confirmation

        //form-method   =>  post
        //form-action   =>  {{ route('admin.changepassword') }}
    @endphp
@section('header-scripts')
    <style>
        label{
            opacity:.6;
            font-weight:600;
            font-size:13px;
        }
        .btn{
            border-radius:0px;
            width:100%;
            border:0px;
            padding:10px;
        }
        .btn:hover{
            background:#4C7D63;
            color:white;
            transition:all .5s;
        }
        .form-control{
            border-radius:0px;
        }
        .form-control:focus{
            box-shadow:none;
            border-color:#4C7D63;
        }
    </style>
@endsection

    <div class="container" >
        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-title"><h3 class="text-center mt-4 text-muted">Change pasword <i class="fa fa-user-secret"></i> </h3><hr class="w-75"></div>
                    <div class="card-body">
                        <form action="{{ route('admin.changepassword') }}" method="post" >
                            @csrf
                            {{ session('success') }}
                            {{ session('failure') }}
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control" name="password" title="password" >
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="new_password" title="new_password" >
                            </div>
                            <div class="form-group" >
                                <label for="">Re-type New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" title="new_password_confirmation" >
                            </div>
                            <input type="submit" class="btn" value="CHANGE PASSWORD" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection