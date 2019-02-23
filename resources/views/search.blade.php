@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="search-post-wrapper">
		<div class="container">
			<h3><span>Search Result for "<span></span>"</span></h3><hr>
			<div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-5dd39e"></i>Random</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-c49bbb"></i>Science</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-525252"></i>Education</a></li>
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-777da7"></i>Q&amp;As</a></li>
								<li class="col-xs-6"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></li>
								<li class="col-xs-6"><a href="#" class="category"><i class="bg-368f8b"></i>Questions</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
			<div class="posts-subwrapper">
				<div class="main">
					<div class="row">
						<div class="content-wrapper">
							<div class="image-wrapper">
								<img src="assets/images/1.jpg" width="100%" alt="">
							</div>
							<div class="post-details">
								<p class="mini-header"><span>3rd feb 2018 </span> - <span class="medicine"> Medicine </span> - <span> 50 comments</span></p>
								<p class="post-header"><b>How to avoid getting a cold</b></p>
								<p class="mini-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet</p>
								<p class="buttons"><a href="" class="btn-sm read"><i class="fa fa-book"></i>Read more</a> </p>
							</div>
						</div>
						<div class="content-wrapper">
							<div class="image-wrapper">
								<img src="assets/images/1.jpg" width="100%" alt="">
							</div>
							<div class="post-details">
								<p class="mini-header"><span>3rd feb 2018 </span> - <span class="medicine"> Medicine </span> - <span> 50 comments</span></p>
								<p class="post-header"><b>How to avoid getting a cold</b></p>
								<p class="mini-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet</p>
								<p class="buttons"><a href="" class="btn-sm read"><i class="fa fa-book"></i>Read more</a> </p>
							</div>
						</div>
						<div class="content-wrapper">
							<div class="image-wrapper">
								<img src="assets/images/1.jpg" width="100%" alt="">
							</div>
							<div class="post-details">
								<p class="mini-header"><span>3rd feb 2018 </span> - <span class="medicine"> Medicine </span> - <span> 50 comments</span></p>
								<p class="post-header"><b>How to avoid getting a cold</b></p>
								<p class="mini-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet</p>
								<p class="buttons"><a href="" class="btn-sm read"><i class="fa fa-book"></i>Read more</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('widgets.footer')
@endsection
