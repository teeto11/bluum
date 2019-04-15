@extends('user.layout.profile')

@section('profile-main')
    <div class="profile-main followers-list-wrapper" style="">
        <div class="header">
            <h4><i class="fa fa-user-plus"></i> Experts you follow</h4>
        </div>

        @foreach($usersFollowing as $expert)
            <div class="follow-wrapper">
                <div class="image-wrapper">
                    <img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($expert->firstname).'.svg') }}" width="100%" height="100" alt="">
                </div>
                <div class="user-details">
                    <div class="details">
                        <p class="name"><b>{{ ucwords($expert->firstname.' '.$expert->lastname) }}</b></p>
                        <p class="job"><b><i class="fa fa-briefcase"></i> {{ ucwords($expert->expert->expertise) }}</b></p>
                    </div>
                    <div class="follow-button">
                        <form action="{{ route('expert.unfollow') }}" method="post" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $expert->id }}" >
                            <input type="hidden" name="redirect" value="user.following" >
                            <button type="submit" class="btn hvr-grow"><i class="fa fa-user-times"></i> Unfollow</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection