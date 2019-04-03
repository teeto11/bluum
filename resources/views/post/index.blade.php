@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >

    <style>
        p{ margin: 0; }
        .posts__content{ width: 100%; }

        .cover_img{
            margin-right: 1rem;
            height: 0;
        }
    </style>
@endsection
@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="category-wrapper">
            @if(request('category'))
                <div class="parrallax-wrapper animated fadeIn" style="background-image:linear-gradient(200deg,rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45), rgba(0, 243, 142, 0.45)), url({{ asset('images/category-pregnant.jpg') }})">
                    <div class="parrallax-contents animated fadeInLeftBig">
                        <img src="{{ asset('fonts/icons/badges/'.$category->icon) }}" class="" width="100" height="100" alt="">
                        <h3 class="">{{ $category->title }}</h3>
                        <p>{{ $category->desc }}</p>
                        <span><b>Posts : </b>{{ $totalPosts }}</span>
                    </div>
                </div>
            @endif
            <div class="category-results-wrapper">
                <section class="container results">
                    <div class="nav">
                        <div class="nav__categories js-dropdown">
                            <div class="nav__select">
                                <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                                <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                                    <ul class="dropdown__catalog row">
                                        <li class="col-xs-6"><a href="{{ route('blog') }}" class="category"><i class="bg-5dd39e"></i>All</a></li>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <li class="col-xs-6"><a href="/blog/{{ formatUrlString($category->value) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="nav__select">
                                <div class="btn-select" data-dropdown-btn="tags">Tags</div>
                                <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                                    <div class="tags">
                                        @foreach($top_tags as $tag)
                                            <a href="/blog/tag/{{ formatUrlString($tag->value) }}" class="bg-4f80b0">{{ $tag->value }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav__menu js-dropdown">
                            <div class="nav__select">
                                <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                                <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                                    <ul class="dropdown__catalog">
                                        <li><a href="{{ route('blog') }}">Latest</a></li>
                                        <li><a href="{{ route('blog.unread') }}">Unread</a></li>
                                        <li><a href="{{ route('blog.popular') }}">Most Liked</a></li>
                                        <li><a href="{{ route('blog.following') }}">Following</a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul>
                                <li id="latest-link" ><a href="{{ route('blog') }}">Latest</a></li>
                                <li id="unread-link" ><a href="{{ route('blog.unread') }}">Unread</a></li>
                                <li id="popular-link" ><a href="{{ route('blog.popular') }}">Most Liked</a></li>
                                <li id="following-link" ><a href="{{ route('blog.following') }}">Following</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="category-post-wrapper">
                        @if ($posts)
                            @foreach ($posts as $post)
                                @php $viewLink = route('blog.post', [$post->id, formatUrlString($post->title)]); @endphp
                                <div class="content-wrapper">
                                    <div class="image-wrapper">
                                        <img src="/storage/post_cover_image/{{ $post->cover_img }}" width="210" height="" alt="">
                                    </div>
                                    <div class="post-details">
                                        <p class="mini-header"><span style="color:#fc5305">{{ formatTime($post->created_at) }}</span> - <span class="medicine"><a href="{{ route('blog.category', formatUrlString($post->category)) }}" style="color:#1ea059;" >{{ ucfirst($post->category) }}</a></span> - <span>{{ $post->replies->count() }} comments</span> - <span class="views" style="color:#fc5305;"> {{ $post->views }} view{{ ($post->views > 1) ? 's' : '' }} </span></p>
                                        <p class="post-header"><a href="{{ $viewLink }}" ><b>{{ ucwords($post->title) }}</b></a> <span class="views" style="float: right; opacity: .6;font-size:14px; color:#A2DABC;"><span class="activity">Last updated</span> {{ getLastActivityTime($post->updated_at) }}</span> </p>
                                        <p class="buttons">
                                            <span class="" style="float: left">Posted by: <a href="{{ route('expert.show', $post->user->id) }}" class="name">{{ ucwords($post->user->firstname.' '.$post->user->lastname) }}</a></span>
                                            <a href="{{ $viewLink }}" class="btn-sm read"><i class="fa fa-book"></i>Read</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{ $posts->links() }}
                </section>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script>
        let activeLink = '{{ $active_link }}';
        $("#"+activeLink).addClass('active');

        $(".cover_img").height($('.posts__item').height());
    </script>
@endsection
