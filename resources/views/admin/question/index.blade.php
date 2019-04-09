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
                                    <a href="{{ route('admin.questions') }}" ><button class="btn btn-success" >View Questions</button></a>
                                @else
                                    <a href="{{ route('admin.questions.deleted') }}" ><button class="btn btn-danger" >View Trash</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <form>
                        <div class="row" >
                            <div class="input-group col-md-6 offset-md-6" >
                                <input type="text" class="form-control" id="search" name="q" title="search" placeholder="Search" value="{{ request('q') }}" >
                                <div class="input-group-addon" >
                                    <input type="submit" class="btn btn-success" value="Search" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="" style="width:20%">User</th>
                            <th scope="" style="width:50%">Question</th>
                            <th scope="" >Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $question)
                            <tr>
                                <td>{{ ucwords($question->user->firstname.' '.$question->user->lastname) }}</td>
                                <td>{{ ucwords($question->title) }}</td>
                                <td>{{ date('M d, Y', strtotime($question->created_at)) }}</td>
                                <td><a href="{{ route('admin.question.show', $question->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye text-light"></i></a></td>
                                @if($question->active)
                                    <td>
                                        <form action="{{ route('admin.question.delete') }}" method="post" class="action-form" id="delete-question-{{ $question->id }}" >
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $question->id }}" >
                                            <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash" ></i></button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{ route('admin.question.restore') }}" method="post" class="action-form" id="restore-question-{{ $question->id }}" >
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
            {{ $posts->links() }}
        </div>
    </div>
@endsection