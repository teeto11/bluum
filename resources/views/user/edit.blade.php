@extends('user.layout.profile')

@section('profile-main')
    <div class="profile-main edit-profile" style="">
        <div class="create" style="margin: 0px;">
            <div class="header">
                <h4 style=""><i class="fa fa-edit"></i> Edit Profile</h4>
            </div>
            <form action="{{ route('user.update') }}" method="post" >
                @csrf
                @if ($errors->has('firstname'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong><p>{{ $errors->first('firstname') }}</p></strong>
                    </span>
                @endif
                @if ($errors->has('lastname'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong><p>{{ $errors->first('lastname') }}</p></strong>
                    </span>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="firstname" >First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="lastname" >Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" />
                        </div>
                    </div>
                </div>
                <div class="create__section">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('email') }}</p></strong>
                        </span>
                    @endif
                    <label class="" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" />
                </div>

                <div class="create__footer">
                    <button type="reset" class="create__btn-cansel btn" >Cancel</button>
                    <button type="submit" class="create__btn-create btn btn--type-02" >Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection