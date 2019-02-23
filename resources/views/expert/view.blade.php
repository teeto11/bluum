@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="profile-wrapper" style="margin-top: 5rem" >
        <div class="container profile-sub-wrapper">
            <div class="profile-sidebar">
                <div class="edit-btn-wrapper">
                    <a href="edit-profile.html" class="edit-btn hvr-pulse" style=""><i class="fa fa-edit"></i>Edit</a>
                </div>
                <div class="profile-sidebar-header">
                    <img src="assets/images/fyuma.jpg" class="" alt="">
                    <p>AGBOMA FESTUS</p>
                </div>
                <div class="profile-sidebar-social hvr-float">
                    <div class="followers">
                        <p><i class="fa fa-users"></i> followers <br> <span>100</span></p>
                    </div>
                    <div class="post">
                        <p><i class="fa fa-sticky-note"></i> post <br> <span>100</span></p>
                    </div>
                </div>
                <div class="btn hvr-grow" style="">Follow <i class="fa fa-plus-circle"></i></div>
                <div class="profile-sidebar-body">
                    <ul>
                        <li><b><i class="fa fa-briefcase"></i> Profession : </b>Medical Doctor</li>
                        <li><b><i class="fa fa-gears"></i> Work Experience : </b>9 years</li>
                        <li><b><i class="fa fa-home"></i> office : </b>Medical Doctor</li>
                    </ul>
                </div>
            </div>
            <div class="profile-main">
                <section class="summary">
					<a href="post" class="posts" type="submit" formaction="experts-post.html"><i class="fa fa-bookmark-o"></i>Posts<br>10</a>
					<a href="answers" class="question" type="submit" formaction="experts-answers.html"><i class="fa fa-question-circle"></i>Answers<br>10</a>
				</section>
                <section class="page-posts">
                    <div class="container post-container">
                        <div class="card-head">
                            <h3 class="">Recent Posts.</h3>
                        </div>
                        <div class="posts bg-success">
                            <div class="posts__head" style="padding-left:10px;padding-right: 10px;">
                                <div class="posts__topic">Post</div>
                                <div class="posts__category">Category</div>
                                <div class="posts__users">Tags</div>
                                <div class="posts__replies">Replies</div>
                                <div class="posts__views">Views</div>
                                <div class="posts__activity">Activity</div>
                            </div>
                            <div class="posts__body">
                                <div class="posts__item">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="#">
                                                    <h3>Current news and discussion</h3>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                    </div>
                                    <div class="posts__section-right">
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">31</div>
                                        <div class="posts__views">14.5k</div>
                                        <div class="posts__activity">13d</div>
                                    </div>
                                </div>
                                <div class="posts__item bg-f2f4f6">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="#">
                                                    <h3>Get your username drawn by the other users of unity! or a drawing based on what you do</h3>
                                                </a>
                                                <div class="posts__tags tags">
                                                    <a href="#" class="bg-4f80b0">gaming</a>
                                                    <a href="#" class="bg-424ee8">nature</a>
                                                    <a href="#" class="bg-36b7d7">entertainment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>Video</a></div>
                                    </div>
                                    <div class="posts__section-right">
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">252</div>
                                        <div class="posts__views">396</div>
                                        <div class="posts__activity">13m</div>
                                    </div>
                                </div>
                                <div class="posts__item">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="#">
                                                    <h3>Which movie have you watched most recently?</h3>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="#" class="category"><i class="bg-3ebafa"></i> Exchange</a></div>
                                    </div>
                                    <div class="posts__section-right">
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">207</div>
                                        <div class="posts__views">7.5k</div>
                                        <div class="posts__activity">41m</div>
                                    </div>
                                </div>
                                <div class="posts__item posts__item--bg-gradient">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="#">
                                                    <h3><span>This post contails spoiler about</span> Star Wars Movie.</h3>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="#" class="category"><i class="bg-777da7"></i> Q&amp;As</a></div>
                                    </div>
                                    <div class="posts__section-right">
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">2.3k</div>
                                        <div class="posts__views">2.0k</div>
                                        <div class="posts__activity">1h</div>
                                    </div>
                                </div>
                                <div class="posts__item">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="#">
                                                    <h3>Take a picture of what you’re doing at this very moment</h3>
                                                </a>
                                                <div class="posts__tags tags">
                                                    <a href="#" class="bg-ec008c">selfie</a>
                                                    <a href="#" class="bg-7cc576">camera</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="#" class="category"><i class="bg-c6b38e"></i> Pets</a></div>
                                    </div>
                                    <div class="posts__section-right">
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">441</div>
                                        <div class="posts__views">3.1k</div>
                                        <div class="posts__activity">6h</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="questions">
					<div class="table-row">
						<div class="bg-white">
							<h3 class="" style="font-size:20px;">Recent Responses</h3><hr>
							<table class="table table-borderless table-hover">
								<thead>
									<tr>
										<th scope="" style="width:80%">Title</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Which movie have you watched most recently</td>
										<td><a href="view-post.html" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
									</tr>
									<tr>
										<td>How to kill thanos  </td>
										<td><a href="" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
									</tr>
									<tr>
										<td>stuff</td>
										<td><a href="" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
				</section>
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection