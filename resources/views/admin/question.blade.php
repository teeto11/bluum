@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-questions-wrapper">
            <div class="table-row">
                <div class="table-responsive bg-white px-4">
                    <h3 class="">All Questions</h3><hr>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="" style="width:20%">User</th>
                            <th scope="" style="width:40%">Question</th>
                            <th scope="" style="width:20%">Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ ucwords($question->user->firstname.' '.$question->user->lastname) }}</td>
                                <td>{{ ucwords($question->title) }}</td>
                                <td>{{ date('M d, Y', strtotime($question->created_at)) }}</td>
                                <td><a href="/admin/question/{{ $question->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="my-3" >
            {{ $questions->links() }}
        </div>
    </div>
@endsection