@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-posts-wrapper">
            <div class="table-row">
                <div class="table-responsive bg-white px-4">
                    <div class="row" >
                        <div class="col-sm-10" >
                            <h3 class="">All Post</h3>
                        </div>
                        <div class="col-sm-2" >
                            <div style="display: flex;align-items: flex-end;justify-content: center;height: 100%;" >
                                @if($type == 'deleted')
                                    <a href="{{ route('admin.posts') }}" ><button class="btn btn-success" >View Posts</button></a>
                                @else
                                    <a href="{{ route('admin.posts.deleted') }}" ><button class="btn btn-sm" style="background:#9e0000; color:white; font-size:13px;" >View Trash <i class="fa fa-trash-o"></i> </button></a>
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
                                    <input type="submit" class="btn" value="Search" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="" >User</th>
                            <th scope="" style="width:50%">Title</th>
                            <th scope="" >Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ ucwords($post->user->firstname.' '.$post->user->lastname) }}</td>
                                <td>{{ ucfirst($post->title) }}</td>
                                <td>{{ date('M d, Y', strtotime($post->created_at)) }}</td>
                                <td class="text-right" >
                                    <a href="{{ route('admin.post.show', $post->id) }}" class="text-dark btn hvr-pulse"><i class="fa fa-eye"></i></a>
                                </td>
                                <td class="text-right" >
                                    @if($type == 'active')
                                        <form action="{{ route('admin.post.delete') }}" method="post" class="action-form" id="delete-post-{{ $post->id }}" >
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $post->id }}" >
                                            <button type="submit" class="btn hvr-grow-rotate" style="background:transparent"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.post.restore') }}" method="post" class="action-form" id="restore-post-{{ $post->id }}" >
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="{{ $post->id }}" >
                                            <button type="submit" class="btn btn-success" ><i class="fa fa-undo"></i></button>
                                        </form>
                                    @endif
                                </td>
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