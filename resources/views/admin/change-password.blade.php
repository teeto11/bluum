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

    <div class="container" >
        <form action="{{ route('admin.changepassword') }}" method="post" >
            @csrf
            {{ session('success') }}
            {{ session('failure') }}
            <div class="form-group">
                <input type="password" class="form-control" name="password" title="password" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="new_password" title="new_password" >
            </div>
            <div class="form-group" >
                <input type="password" class="form-control" name="new_password_confirmation" title="new_password_confirmation" >
            </div>
            <input type="submit" class="btn btn-success" value="CHANGE PASSWORD" >
        </form>
    </div>
@endsection