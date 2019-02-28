<!-- NAVIGATION -->
<header>
    <div class="header js-header js-dropdown">
        <div class="container nav-wrapper">
            <div class="header__logo">
                <a class="header__link" href="/" title="Bluumhealth">
                    <h1>
                        <img src="{{ asset('images/logo_small.png') }}" alt="logo" />
                    </h1>
                    <div class="header__logo-btn">Bluumhealth</div>
                </a>
            </div>
            <div class="header__search">
                <form action="{{ route('search') }}" method="post" id="search-form" >
                    @csrf
                    <label>
                        <i class="icon-Search js-header-search-btn-open" id="search-btn" ></i>
                        <input type="search" placeholder="Search anything" class="form-control" name="sQuery" />
                    </label>
                </form>
                <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
            </div>
            <div class="header__menu sm-none">
                <a class="header__menu__link" href="{{ route('question.create') }}">Ask</a>
            </div>
            <div class="header__menu active sm-none">
                <a class="header__menu__link active" href="{{ route('blog') }}">Blog</a>
            </div>
            <div class="header__menu header__dropdown">
                <div class="header__menu-btn" data-dropdown-btn="menu">
                    Questions <i class="icon-Menu_Icon"></i>
                </div>
                <nav class="dropdown dropdown--design-01" data-dropdown-list="menu">
                    <div>
                        <ul class="dropdown__catalog row">
                            <li class="col-xs-6"><a href="{{ route('question.create') }}">New</a></li>
                            <li class="col-xs-6"><a href="{{ route('experts') }}">Experts</a></li>
                            <li class="col-xs-6"><a href="/tags">Tags</a></li>
                            <li class="col-xs-6"><a href="{{ route('question.showbycategory', 'pregnancy') }}">Pregnancy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3>Categories</h3>
                        <ul class="dropdown__catalog row">
                            <li class="col-xs-6"><a href="{{ route('questions') }}" class="category"><i class="bg-5dd39e"></i>All</a></li>
                            <li class="col-xs-6"><a href="{{ route('question.showbycategory', 'pregnancy') }}" class="category"><i class="bg-c49bbb"></i>Pregnancy</a></li>
                            <li class="col-xs-6"><a href="{{ route('question.showbycategory', formatUrlString('medical travels')) }}" class="category"><i class="bg-525252"></i>Medical travels</a></li>
                            <li class="col-xs-6"><a href="{{ route('question.showbycategory', formatUrlString('common illness')) }}" class="category"><i class="bg-777da7"></i>Common illness</a></li>
                            <li class="col-xs-6"><a href="{{ route('question.showbycategory', formatUrlString('special illness')) }}" class="category"><i class="bg-368f8b"></i>Special illness</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul class="dropdown__catalog row">
                            <li class="col-xs-6"><a href="#">Forum Rules</a></li>
                            <li class="col-xs-6"><a href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            @guest
                <div class="header__menu">
                    <a class="header__menu__link" href="{{ route('login') }}">Sign In</a>
                </div>
                <div class="header__menu">
                    <a class="header__menu__link" href="{{ route('register') }}">Sign Up</a>
                </div>
            @else
                <div class="header__user">
                    <div class="header__user-btn" data-dropdown-btn="user">
                        <img src="{{ asset('fonts/icons/avatars/'.ucfirst(Auth::user()->firstname[0]).'.svg') }}" alt="avatar">
                        {{ ucwords(Auth::user()->firstname.' '.Auth::user()->lastname) }}<i class="icon-Arrow_Below"></i>
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
                        <div>
                            <div class="dropdown__icons">
                                <a href="#"><i class="icon-Bookmark"></i></a>
                                <a href="#"><i class="icon-Message"></i></a>
                                <a href="#"><i class="icon-Preferences"></i></a>
                                <a href="#"><i class="icon-Logout"></i></a>
                            </div>
                        </div>
                        <div>
                            <ul class="dropdown__catalog">
                                @if(auth()->user()->role == 'EXPERT')
                                    <li><a href="{{ route('expert.profile') }}">Dashboard</a></li>
                                    <li><a href="{{ route('expert.posts') }}">Topics</a></li>
                                @else
                                    <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('user.questions') }}">Questions</a></li>
                                @endif
                                {{--<li><a href="#">Badges</a></li>
                                <li><a href="#">My Groups</a></li>--}}
                                <li><a href="{{ route('notification') }}">Notifications</a></li>
                                {{--<li><a href="">Likes</a></li>
                                <li><a href="#">Solved</a></li>--}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            @endguest
        </div>
        @guest

        @else
            <div class="header__offset-btn">
                <a href="{{ route('blog.post.create') }}"><img src="{{asset('fonts/icons/main/New_Topic.svg')}}" alt="New Blog Post"></a>
            </div>
        @endguest
    </div>
</header>
