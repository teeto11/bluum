@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-5">
        <h1 class="my-0" style="opacity:0.7">Overview <i class="fa fa-dashboard"></i></h1>
        <div class="row p-1">
            <div class="col-sm-12 col-md-6 col-lg-3" id="dash-content">
                <div class="content-holder holder-1 hvr-float">
                    <i class="fa fa-clipboard"></i>
                    <p>Blog Post<br><span>{{ $blogPost }}</span></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3" id="dash-content">
                <div class="content-holder holder-2 hvr-float">
                    <i class="fa fa-question-circle-o"></i>
                    <p>Questions<br><span>{{ $questions }}</span></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3" id="dash-content">
                <div class="content-holder holder-3 hvr-float">
                    <i class="fa fa-cogs"></i>
                    <p>Experts<br><span>{{ $experts }}</span></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3" id="dash-content">
                <div class="content-holder holder-4 hvr-float">
                    <i class="fa fa-users"></i>
                    <p>Users<br><span>{{ $users }}</span></p>
                </div>
            </div>
        </div>
        <div class="table-row">
            <div class="table-responsive bg-white">
                <h3 class="">Latest Questions</h3>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="" >User</th>
                        <th scope="" style="width:60%">Question</th>
                        <th scope="">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latestQuestions as $question)
                        <tr>
                            <td>{{ $question->user->firstname }}</td>
                            <td>{{ $question->body }}</td>
                            <td>{{ date('H:ia d-M-Y', strtotime($question->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row table-row my-3">
            <div class="col-md-6 py-2">
                <div class="table-responsive bg-white">
                    <h3 class="">Experts</h3>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="" style="width:35%">Expert</th>
                            <th scope="" style="width:45%">Profession</th>
                            <th scope="">Post</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestExperts as $expert)
                            <tr>
                                <td>{{ ucwords($expert->firstname.' '.$expert->lastname) }}</td>
                                <td>{{ $expert->username }}</td>
                                <td>{{ $expert->post->where('type', 'POST')->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 py-2">
                <div class="table-responsive bg-white">
                    <h3 class="">Users</h3>
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th scope="" style="width:20%">User</th>
                            <th scope="" style="width:45%">Email</th>
                            <th scope="">Question</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestUsers as $user)
                            <tr>
                                <td>{{ ucwords($user->firstname.' '.$user->lastname) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->post->where('type', 'QUESTION')->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection