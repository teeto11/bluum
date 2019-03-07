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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th >Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{!! ($user->active) ? '<span class="text-success" >active</span>' : '<span class="text-danger" >disabled</span>' !!}</td>
                                            <td>{{ formatTime($user->created_at) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection