@extends('expert.layout.profile')

@section('profile-main')
    <div class="profile-main edit-profile" style="width:100%">
        <div class="create" style="margin: 0px;">
            <div class="header">
                <h4 style=""><i class="fa fa-edit"></i> Edit Profile</h4>
            </div>
            <form action="{{ route('expert.update') }}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="firstname" >First Name</label>
                            <input type="text" class="form-control" id="firstname" value="{{ $expert->firstname }}" readonly disabled />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="lastname" >Last Name</label>
                            <input type="text" class="form-control" id="lastname" value="{{ $expert->lastname }}" readonly disabled />
                        </div>
                    </div>
                </div>
                @if ($errors->has('telephone'))
                    <div class="invalid-feedback text-danger" role="alert">
                        <p><strong>{{ $errors->first('telephone') }}</strong></p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $expert->email }}" readonly disabled />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="tel" >Telephone</label>
                            <input type="number" class="form-control" id="tel" name="telephone" value="{{ $expert->expert->telephone }}" />
                        </div>
                    </div>
                </div>
                @if ($errors->has('expertise'))
                    <div class="invalid-feedback text-danger" role="alert">
                        <p><strong>{{ $errors->first('expertise') }}</strong></p>
                    </div>
                @endif
                @if ($errors->has('experience'))
                    <div class="invalid-feedback text-danger" role="alert">
                        <p><strong>{{ $errors->first('experience') }}</strong></p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="expertise" >Expertise</label>
                            <input type="text" class="form-control" id="expertise" name="expertise" value="{{ $expert->expert->expertise }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="create__section">
                            <label class="" for="experience" >Experience</label>
                            <input type="number" class="form-control" id="experience" name="experience" value="{{ $expert->expert->experience }}" />
                        </div>
                    </div>
                </div>

                <div class="create__section">
                    @if ($errors->has('about'))
                        <div class="invalid-feedback text-danger" role="alert">
                            <p><strong>{{ $errors->first('about') }}</strong></p>
                        </div>
                    @endif
                    <label class="" for="about">About</label>
                    <textarea class="form-control" id="about" name="about" >{{ $expert->expert->about }}</textarea>
                </div>

                <div class="create__footer">
                    <button type="reset" class="create__btn-cansel btn" >Cancel</button>
                    <button type="submit" class="create__btn-create btn btn--type-02" >Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection