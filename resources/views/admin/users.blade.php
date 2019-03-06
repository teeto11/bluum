@extends('layouts.admin')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')

<div class="content-wrapper px-4">
                <div class="view-users-wrapper">
                    <div class="table-row">
                        <div class="table-responsive bg-white px-4">
                            <h3 class="">All Users</h3><hr>
                            <form action="">
                                <div class="row">
                                    <div class="input-group col-md-6 offset-md-6">
                                        <input type="text" class="form-control" id="search" name="q" title="search" placeholder="Search" value="">
                                        <div class="input-group-addon">
                                            <input type="submit" class="btn btn" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="" style="width:25%">Userame</th>
                                        <th scope="" style="width:25%">Email</th>
                                        <th scope="" style="width:15%">Role</th>
                                        <th scope="" style="width:10%">Status</th>
                                        <th style="width:15%">Joined</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->active }}</td>
                                            <td>{{ $user->create_at }}</td>
                                            <td><a href="/admin/view-user/{{ $user->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection