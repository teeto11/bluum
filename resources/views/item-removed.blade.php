@php $title = 'Not Found' @endphp
@extends('layouts.app-temp')

@section('content')
    <div style="margin: 10vh auto;text-align: center" >
        <h1><i class="fa fa-warning" ></i> Item has been removed from this site</h1>
        @if(isset($back))
            <a href="{{ $back }}" >Return</a>
        @endif
    </div>
@endsection