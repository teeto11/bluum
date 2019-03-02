@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="experts-wrapper">
        <div class="container experts-container">
            <h2>Meet our Experts</h2>
            <hr>
            <div class="container-fluid expert-card-wrapper" >
                @foreach($experts as $expert)
                    @php $details = $expert->expert @endphp
                    <div class="expert-card hvr-float ">
                        <div class="image-wrapper">
                            <img src="{{ asset('storage/profile_img/'.$expert->expert->profile_picture) }}" class="" alt="">
                        </div>
                        <div class="details-body">
                            <section class="expert-header">
                                <h6 class="expert-name"><i class="fa fa-user-circle-o"></i>{{ ucwords($expert->firstname.' '.$expert->lastname) }}</h6>
                                <h6 class="expert-practice"><i class="fa fa-briefcase"></i> {{ ucwords($details->expertise)  }}</h6>
                            </section>
                            <section class="expert-summary">
                                <p>{{ ucfirst($details->about) }}.</p>
                            </section>
                            <section class="expert-footer" style="" >
                                <span class="exp"><b>WORK EXPERIENCE : </b>{{ $details->experience }} YEARS</span>
                                <div class="small">
                                    <section>
                                        @if(auth()->user() && $expert->followers->where('user_id', auth()->user()->id)->count())
                                            <form action="{{ route('expert.unfollow') }}" method="post" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $expert->id }}">
                                                <button type="submit" class="btn hvr-grow">UnFollow <i class="glyphicon-remove-sign"></i></button>
                                            </form>
                                        @elseif(auth()->user() && $expert->id == auth()->user()->id)

                                        @else
                                            <form action="{{ route('expert.follow') }}" method="post" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $expert->id }}">
                                                <button type="submit" class="btn hvr-grow">Follow <i class="icon-Add_User"></i></button>
                                            </form>
                                        @endif
                                        <a href="{{ route('expert.show', ['id' => $expert->id]) }}" class="button" style="padding: 1rem;" ><span>View profile </span></a>
                                    </section>
                                </div>
                            </section>
                        </div>
                    </div>
                @endforeach
                <div style="margin-top: 2rem" >
                    {{ $experts->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection