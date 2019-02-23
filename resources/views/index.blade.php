@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <section class="bg-header view text-white">
		<div class="container text-center mask rgba-gradient hoverable">
			<h1>Your journey through pregnancy <br />begins here.</h1>
			<p>
				<a href="/register" class="btn btn-bluum btn-lg">Get Started</a>
			</p>
		</div>
	</section>
    <!-- MAIN -->
    <section class="page-categories">
        <div class="container text-center">
			<div class="card-head">
				<h3 class="h2">Features For You.</h3>
				<p class="lead">Expressive community for knowledge in pregnancy journey and baby health</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/pregnant.png') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog.category', formatUrlString('pregnancy')) }}" title="">
							<div class="card-body">
								<h4 class="card-title">Pregnancy</h4>
								<p class="card-text">Connect with experts and other users for a stress free and exciting pregnancy experience, trimester by trimester.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/medical.png') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog.category', formatUrlString('medical travels')) }}" title="">
							<div class="card-body">
								<h4 class="card-title">Pregnancy Medical Travels</h4>
								<p class="card-text">Connect and get concise information from experienced moms for your baby delivery and health outside your country of residence.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/illness.jpg') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog.category', formatUrlString('common illness')) }}" title="">
							<div class="card-body">
								<h4 class="card-title">Common Illnesses</h4>
								<p class="card-text">Connect with experts and other users on information regarding to common illnesses that can tamper with your babies' healthy development e.g measles.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/special_illness.jpg') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog.category', formatUrlString('special illness')) }}" title="">
							<div class="card-body">
								<h4 class="card-title">Special Illnesses</h4>
								<p class="card-text">Connect with experts and other users on information regarding to special illnesses around children that can be avoided and also managed for healthy development.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/Lets_talk.svg') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog.category', formatUrlString('bluum stories')) }}" title="">
							<div class="card-body">
								<h4 class="card-title">Bluum Stories</h4>
								<p class="card-text">Tell your story of how your pregnancy, the scare, the joy, the moments, the myths and how your journey can motivate a newbie in the process.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="{{ asset('fonts/icons/badges/blog.svg') }}" alt="user-icon" /></p>
						<a class="card-content-links" href="{{ route('blog') }}" title="">
							<div class="card-body">
								<h4 class="card-title">Blog</h4>
								<p class="card-text">All news and exciting new findings for you and your baby.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
        </div>
    </section>
    <section class="page-experts">
        <div class="container">
			<div class="card-head text-center">
				<h3 class="h2">Meet our medical experts.</h3>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="card expert__description bg-gradient-rb">
								<div class="card-body">
									<div class="card-icon-content">
										<div class="card-icon">
											<i class="icon-Bookmark"></i>
										</div>
										<div class="card-icon-text">
											<h5 class="card-title">Ask an expert</h5>
											<p class="card-text">We took a step further and created a set of 70+ pages for a variety of purposes that makes it the ideal point to start building websites of any kind.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card ask-expert">
								<div class="card-body">
									<h3 class="card-text">320+ Gynaecologists, <br />Paediatricians, <br />and experts.</h3>
									<p class="card-text mute">Join a live session to get started.</p>
									<p><a href="{{ route('question.create') }}" class="btn btn-lg btn-ask btn-lg">Ask an expert</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="row text-center">
                        <div class="col-md-12">
                        @foreach($topExperts as $expert)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card expert-card">
                                    <img class="card-img-top" src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($expert->firstname).'.svg') }}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ ucwords("$expert->firstname $expert->lastname") }}</h5>
                                        <p class="card-text">{{ ucfirst($expert->expert->about) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </section>
    <section class="page-posts">
        <div class="container">
			<div class="card-head text-center">
				<h3 class="h2">Popular questions.</h3>
			</div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Questions</div>
                    <div class="posts__category">Categories</div>
                    <div class="posts__users">Experts</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
					@php $counter = 1; @endphp
                    @foreach ($popular_questions as $question)
                        <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                            <div class="posts__section-left">
                                <div class="posts__topic">
                                    <div class="posts__content">
                                        <a href="/question/{{ $question->id }}/{{ formatUrlString($question->title) }}">
                                            <h3>{{ $question->title }}</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="posts__category"><a href="/questions/category/{{ $question->category }}" class="category"><i class="bg-368f8b"></i>{{ ucfirst($question->category) }}</a></div>
                            </div>
                            <div class="posts__section-right">
                                <div class="posts__users">
									@foreach($question->popularReplies as $reply)
										<div>
											<a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($reply->user->firstname)).'.svg' }}" alt="avatar"></a>
										</div>
									@endforeach
                                </div>
                                <div class="posts__replies">{{ count($question->replies) }}</div>
                                <div class="posts__views">{{ $question->views }}</div>
                                <div class="posts__activity">{{ getLastActivityTime($question->updated_at) }}</div>
                            </div>
                        </div>
						@php $counter++ @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('widgets.footer')
@endsection
