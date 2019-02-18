@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-post-wrapper px-4">
            <div class="row my-2">
                <div class="col-md-12 bg-white py-4">
                    <div class="post-details">
                        <div class="row" >
                            <h3 class="col-10" >Post Details <a href="" class="btn btn-sm float-right"></a></h3><hr>
                            <div class="col-2 text-right" >
                                <form action="{{ route('admin.post.delete') }}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $post->id }}" >
                                    <button type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="table-row">
                            <div class="table-responsive bg-white">
                                <table class="table table-borderless table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ ucwords($post->title) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ ucfirst($post->category) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Content</td>
                                        <td>{{ ucfirst($post->body) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Writer</td>
                                        <td>{{ ucwords($post->user->firstname.' '.$post->user->lastname) }}</td>
                                    </tr>
                                    {{--<tr class="bg-light">
                                        <td></td>
                                        <td>
                                            <a href="edit-post.html">Edit <i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="comments">
                    <div class="table-row">
                        <div class="table-responsive bg-white">
                            <h3 class="">Comments</h3><hr>
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="" >User</th>
                                    <th scope="" style="width:60%">comment</th>
                                    <th scope="">Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ ucwords($comment->user->firstname.' '.$comment->user->lastname) }}</td>
                                        <td>{{ ucfirst($comment->body) }}</td>
                                        <td>{{ date('M d, Y', strtotime($comment->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('admin.post.comment.delete') }}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $comment->id }}" >
                                                <button type="submit" class="btn btn-danger" style="font-size: 1rem" ><i class="fa fa-trash"></i></button>
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