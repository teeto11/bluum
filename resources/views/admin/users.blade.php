@extends('layouts.admin')

@section('content')

    @foreach($users as $user)

        <p><strong>FIRST NAME: </strong></p>{{ $user->firstname }}
        <p><strong>LAST NAME: </strong></p>{{ $user->lastname }}
        <p><strong>USERNAME: </strong></p>{{ $user->username }}
        <p><strong>EMAIL: </strong></p>{{ $user->email }}
        <p><strong>STATUS: </strong></p>{{ $user->active }}
        <p><strong>VERIFIED: </strong></p>{{ $user->verified }}
        <p><strong>ROLE: </strong></p>{{ $user->role }}
        <p><strong>JOINED: </strong></p>{{ $user->create_at }}
        <hr>

    @endforeach
@endsection