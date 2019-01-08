@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <section class="bg-header view text-white">
		<div class="container text-center mask rgba-gradient hoverable">
			<h1>Your journey through pregnancy <br />begins here.</h1>
			<p>
				<a href="signup.html" class="btn btn-bluum btn-lg">Get Started</a>
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
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/pregnant.png" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
							<div class="card-body">
								<h4 class="card-title">Pregnancy</h4>
								<p class="card-text">Connect with experts and other users for a stress free and exciting pregnancy experience, trimester by trimester.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/medical.png" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
							<div class="card-body">
								<h4 class="card-title">Pregnancy Medical Travels</h4>
								<p class="card-text">Connect and get concise information from experienced moms for your baby delivery and health outside your country of residence.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/illness.jpg" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
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
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/special_illness.jpg" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
							<div class="card-body">
								<h4 class="card-title">Special Illnesses</h4>
								<p class="card-text">Connect with experts and other users on information regarding to special illnesses around children that can be avoided and also managed for healthy development.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/Lets_talk.svg" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
							<div class="card-body">
								<h4 class="card-title">Bluum Stories</h4>
								<p class="card-text">Tell your story of how your pregnancy, the scare, the joy, the moments, the myths and how your journey can motivate a newbie in the process.</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card card-content">
						<p><img class="card-img-top" src="./assets/fonts/icons/badges/blog.svg" alt="user-icon" /></p>
						<a class="card-content-links" href="" title="">
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
									<p><a href="create-post.html" class="btn btn-lg btn-ask btn-lg">Ask an expert</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="row text-center">
						<div class="col-md-12">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="card expert-card">
									<img class="card-img-top" src="./assets/fonts/icons/avatars/B.svg" alt="Card image cap" />
									<div class="card-body">
										<h5 class="card-title">Expert Name</h5>
										<p class="card-text">Expert description, expert description, expert description, expert description, expert description.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="card expert-card">
									<img class="card-img-top" src="./assets/fonts/icons/avatars/D.svg" alt="Card image cap" />
									<div class="card-body">
										<h5 class="card-title">Expert Name</h5>
										<p class="card-text">Expert description, expert description, expert description, expert description, expert description.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="card expert-card">
									<img class="card-img-top" src="./assets/fonts/icons/avatars/W.svg" alt="Card image cap" />
									<div class="card-body">
										<h5 class="card-title">Expert Name</h5>
										<p class="card-text">Expert description, expert description, expert description, expert description, expert description.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="card expert-card">
									<img class="card-img-top" src="./assets/fonts/icons/avatars/O.svg" alt="Card image cap" />
									<div class="card-body">
										<h5 class="card-title">Expert Name</h5>
										<p class="card-text">Expert description, expert description, expert description, expert description, expert description.</p>
									</div>
								</div>
							</div>
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
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/A.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/G.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/P.svg" alt="avatar"></a>
                                </div>
                            </div>
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
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/L.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/T.svg" alt="avatar"></a>
                                </div>
                            </div>
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
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/E.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/I.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/R.svg" alt="avatar"></a>
                                </div>
                            </div>
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
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/F.svg" alt="avatar"></a>
                                </div>
                            </div>
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
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/C.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/U.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/I.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">441</div>
                            <div class="posts__views">3.1k</div>
                            <div class="posts__activity">6h</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('widgets.footer')
@endsection
