@extends('user.layout.profile')

@section('profile-main')
    <section class="nav">
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
                    </ul>
                </nav>
            </div>
        </div>
        <div class="nav__menu js-dropdown">
            <div class="nav__select">
                <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                    <ul class="dropdown__catalog">
                        <li><a href="#">Latest</a></li>
                        <li><a href="#">Most Liked</a></li>
                    </ul>
                </div>
            </div>
            <ul>
                <li class="active"><a href="#">Latest</a></li>
                <li><a href="#">Most Liked</a></li>
            </ul>
        </div>
    </section>
    <section class="posts">
        <div class="posts__head">
            <div class="posts__topic">Questions</div>
            <div class="posts__category">Category</div>
            <div class="posts__replies">Answers</div>
            <div class="posts__views">Views</div>
            <div class="posts__activity" id="post_actions"></div>
        </div>
        <div class="posts__body">
            <div class="posts__item">
                <div class="posts__section-left">
                    <div class="posts__topic">
                        <div class="posts__content">
                            <a href="single-post.html">
                                <h3>Current news and discussion</h3>
                            </a>
                        </div>
                    </div>
                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                </div>
                <div class="posts__section-right">
                    <div class="posts__replies">31</div>
                    <div class="posts__views">14.5k</div>
                    <div class="posts__activity" id="post_actions">
                        <div>
                            <a href="#" class=""><i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="#" class=""><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection