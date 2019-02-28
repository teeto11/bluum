@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-questions-wrapper">
            <div class="table-row">
                <div class="table-responsive bg-white px-4">
                    <div class="row" >
                        <div class="col-sm-10" >
                            <h3 class="">All Questions</h3>
                        </div>
                        <div class="col-sm-2 text-center" >
                            <div style="display: flex;align-items: flex-end;justify-content: center;height: 100%;" >
                                @if($type == 'deleted')
                                    <a href="{{ route('admin.questions') }}" ><button class="btn btn-success" ><i class="fa fa-eye" ></i></button></a>
                                @else
                                    <a href="{{ route('admin.questions.deleted') }}" ><button class="btn btn-danger" ><i class="fa fa-trash" ></i></button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
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
                                @if($question->active)
                                    <td><a href="/admin/question/{{ $question->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a></td>
                                @else
                                    <td>
                                        <form action="{{ route('admin.question.restore') }}" method="post" >
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="{{ $question->id }}" >
                                            <button type="submit" class="btn btn-sm btn-success" ><i class="fa fa-undo text-light"></i></button>
                                        </form>
                                    </td>
                                @endif
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