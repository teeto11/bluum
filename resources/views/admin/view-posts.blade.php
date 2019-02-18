@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-posts-wrapper">
            <div class="table-row">
                <div class="table-responsive bg-white px-4">
                    <h3 class="">All Post</h3><hr>
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
                                    <a href="/admin/post/{{ $post->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a>
                                </td>
                                <td class="text-right" >
                                    <form action="{{ route('admin.post.delete') }}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $post->id }}" >
                                        <button type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
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
    <div class="my-4" >
        {{ $posts->links() }}
    </div>
@endsection