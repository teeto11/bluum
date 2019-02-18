@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-question-wrapper px-4">
            <div class="row my-2">
                <div class="col-md-12 bg-white py-4">
                    <div class="post-details">
                        <div class="table-row">
                            <div class="bg-white">
                                <div class="row" >
                                    <h3 class="col-10" >Question Details</h3>
                                    <div class="col-2 text-right" >
                                        <form action="{{ route('admin.question.delete') }}" method="post" >
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $question->id }}" >
                                            <button type="submit" class="btn btn-sm" ><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-responsive table-borderless table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $question->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Question</td>
                                        <td>{{ $question->body }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ ucfirst($question->category) }}</td>
                                    </tr>
                                    <tr>
                                        <td>User</td>
                                        <td>{{ ucwords($question->user->firstname.' '.$question->user->lastname) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 px-0" id="comments">
                    <div class="table-row">
                        <div class="table-responsive bg-white">
                            <h3 class="">Answer</h3><hr>
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="" >User</th>
                                    <th scope="" style="width:70%">Answer</th>
                                    <th scope="">Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($answers as $answer)
                                    <tr>
                                        <td>{{ ucwords($answer->user->firstname.' '.$answer->user->lastname) }}</td>
                                        <td>{{ ucfirst($answer->body) }}</td>
                                        <td>{{ date('M d, Y', strtotime($answer->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('admin.question.answer.delete') }}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $answer->id }}" name="id" >
                                                <button type="submit" class="btn btn-danger" style="font-size:10px;"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection