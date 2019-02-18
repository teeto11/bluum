@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="add-expert-wrapper">
            <h4><i class="fa fa-gears"></i> Add Expert</h4><hr>
            <form action="{{ route('admin.expert.store') }}" method="post" >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="email">Email</label>
                        <input type="Email" class="form-control" name="email" id="email" placeholder="E.g expert@gmail.com">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Telephone</label>
                        <input type="tel" class="form-control" name="tel" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Expertise</label>
                        <input type="text" class="form-control" name="expertise" id="" placeholder="e.g Medical doctor">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Experience</label>
                        <input type="number" min="0" class="form-control" name="experience" id="" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="">About Expert</label>
                    <textarea name="about" class="form-control" id="" rows="10"></textarea>
                </div>
                <div class="w-100 btn-container">
                    <input type="submit" class="post-btn btn" name="" id="" value="Create">
                    <input type="reset" class="delete-btn btn" name="" id="" value="Delete">
                </div>
            </form>
        </div>

    </div>
@endsection