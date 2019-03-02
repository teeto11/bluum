@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-expert-wrapper px-4">
            <div class="row my-2">
                <div class="col-lg-8 bg-white py-3">
                    <div class="post-details">
                        <div class="table-row">
                            <div class="table-responsive bg-white">
                                <h3 class="">Expert Details <a href="" class="btn btn-sm float-right"></a></h3><hr>
                                <table class="table table-borderless table-hover">
                                    <tbody>
                                    <tr><img src="{{ asset('storage/profile_img/'.$expert->expert->profile_picture) }}" class="expert-img my-3" alt=""></tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ ucwords($expert->firstname.' '.$expert->lastname) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Expertise</td>
                                        <td>{{ $expert->expert->expertise }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $expert->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td>{{ $expert->expert->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        @if($expert->expert->active)
                                            <td>
                                                <form method="post" action="{{ route('admin.expert.delete') }}" class="action-form" id="disable-expert-{{ $expert->id }}"  >
                                                    @csrf
                                                    @method('delete')
                                                    <input name="id" type="hidden" value="{{ $expert->id }}" >
                                                    <button type="submit" class="btn btn-danger btn-sm" >DISABLE</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form method="post" action="{{ route('admin.expert.enable') }}" class="action-form" id="enable-expert-{{ $expert->id }}" >
                                                    @csrf
                                                    @method('put')
                                                    <input name="id" type="hidden" value="{{ $expert->id }}" >
                                                    <button type="submit" class="btn btn-success btn-sm" >ENABLE</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 px-1 followers py-1" style="">
                    <div class="header"><h3>Followers</h3></div>
                    <div class="body">
                        <ul>
                            @foreach($expert->followers as $follower)
                                @php $fUsert = $follower->user @endphp
                                <li class="px-3" > <a href="" >{{ ucwords($fUsert->firstname.' '.$fUsert->lastname) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 px-1 all-post-wrapper py-2">
                    <div class="table-row">
                        <div class="table-responsive bg-white">
                            <h3 class="">All Post</h3><hr>
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="" style="width:60%">Title</th>
                                    <th scope="" style="width:20%">Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recentPost as $post)
                                    <tr>
                                        <td>{{ ucwords($post->title) }}</td>
                                        <td>{{ date('M d, Y', strtotime($post->created_at)) }}</td>
                                        <td><a href="/admin/post/{{ $post->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-1 py-2 all-answers-wrapper">
                    <div class="table-row">
                        <div class="table-responsive bg-white">
                            <h3 class="">Recent Responses</h3><hr>
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="" style="width:40%">Title</th>
                                    <th scope="" style="width:40%">Response</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recentResponses as $response)
                                    <tr>
                                        <td>{{ ucwords($response->post->title) }}</td>
                                        <td>{{ $response->body }}</td>
                                        <td><a href="/admin/post/{{ $response->post->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a> </td>
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