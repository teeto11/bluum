@extends('layouts.admin')

@section('content')
    <div class="content-wrapper px-4">
        <div class="view-experts-wrapper">
            <div class="table-row">
                <div class="table-responsive bg-white px-4">
                    <h3 class="">All Experts</h3><hr>
                    <form action="">
                        <div class="row">
                            <div class="input-group col-md-6 offset-md-6">
                                <input type="text" class="form-control" id="search" name="q" title="search" placeholder="Search" value="">
                                <div class="input-group-addon">
                                    <input type="submit" class="btn btn" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="" style="width:25%">Expert</th>
                            <th scope="" style="width:25%">Expertise</th>
                            <th scope="" style="width:20%">Posts</th>
                            <th style="width:20%">Answers</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($experts as $expert)
                            <tr>
                                <td>{{ ucwords($expert->firstname.' '.$expert->lastname) }}</td>
                                <td>{{ $expert->expert->expertise }}</td>
                                <td>{{ $expert->post->count() }}</td>
                                <td>{{ $expert->replies->count() }}</td>
                                <td><a href="/admin/expert/{{ $expert->id }}" class="btn btn-warning"><i class="fa fa-eye text-light"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $experts->links() }}
    </div>
@endsection