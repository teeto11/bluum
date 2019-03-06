@extends('layouts.admin')

@section('content')
<div class="content-wrapper px-4">
    <div class="view-expert-wrapper px-4">
        <div class="row my-2">
            <div class="col-lg-8 bg-white py-3">
                <div class="post-details">
                    <div class="table-row">
                        <div class="table-responsive bg-white">
                            <h3 class="">User Details <a href="" class="btn btn-sm float-right"><i class="fa fa-trash"></i></a></h3><hr>
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr><img src="../assets/images/fyuma.jpg" class="expert-img" alt=""></tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>{{ $user->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $user->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td>Account status</td>
                                        <td>
                                            <form method="post" action="{{ route('admin.user.enable') }}" class="action-form" id="enable-expert-{{ $user->id }}" >
                                                @csrf
                                                @method('put')
                                                <input name="id" type="hidden" value="{{ $user->id }}" >
                                                <button type="submit" class="btn btn-success btn-sm" >ENABLE</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 px-1 followers py-1" style="">
                <div class="header"><h3>Following</h3></div>
                <div class="body">
                    <ul>
                        <li class=""><a href=""><img src="../assets/images/dafom.jpg" height="50px" width="50px" alt=""> Chollom Dafom</a></li>
                        <li class=""><a href=""><img src="../assets/images/dafom.jpg" height="50px" width="50px" alt=""> Chollom Dafom</a></li>
                        <li class=""><a href=""><img src="../assets/images/dafom.jpg" height="50px" width="50px" alt=""> Chollom Dafom</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-1 all-post-wrapper py-2">
                <div class="table-row">
                    <div class="table-responsive bg-white">
                        <h3 class="">All Questions</h3><hr>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="" style="width:60%">Title</th>
                                    <th scope="" style="width:20%">Date</th> 
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>feb 2, 2019 </td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>feb 2, 2019 </td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>feb 2, 2019 </td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>Which movie have you watched most recently</td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>Which movie have you watched most recently</td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Which movie have you watched most recently</td>
                                    <td>Which movie have you watched most recently</td>
                                    <td><a href="view-post.html" class="btn"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="" class="btn"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection