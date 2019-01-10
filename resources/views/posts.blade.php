@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar');
    <main>
        <div class="container">
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                            <ul class="dropdown__catalog row">
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li class="col-xs-6"><a href="/blog/{{ $category->value }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="tags">Tags</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                <a href="#" class="bg-6f7e9c">funny</a>
                                <a href="#" class="bg-a3d39c">climbing</a>
                                <a href="#" class="bg-8781bd">dreams</a>
                                <a href="#" class="bg-f1ab32">life</a>
                                <a href="#" class="bg-3b96ca">reason</a>
                                <a href="#" class="bg-348aa7">social</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav__menu js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                            <ul class="dropdown__catalog">
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Most Liked</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul>
                        <li class="active"><a href="#">Latest</a></li>
                        <li><a href="#">Unread</a></li>
                        <li><a href="#">Most Liked</a></li>
                    </ul>
                </div>
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Post</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Experts</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
                    <style media="screen">
                        .ellipsis {
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    </style>
                    @if ($pinned_posts)
                        @foreach ($pinned_posts->all() as $post)
                            <div class="posts__item bg-fef2e0">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="/blog/post/{{ $post->id }}">
                                                <h3><i><img src="{{ asset('fonts/icons/main/Pinned.svg') }}" alt="Pinned"></i>{{ $post->title }}</h3>
                                            </a>
                                            <p class="ellipsis" >{!! $post->body !!}</p>
                                            <div class="posts__tags tags">
                                                @php $tags = explode(',', $post->tags); @endphp
                                                @foreach ($tags as $tag)
                                                    <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>{{ $post->category }}</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users js-dropdown">
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/B.svg') }}" alt="avatar" data-dropdown-btn="user-b"></a>
                                            <div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y" data-dropdown-list="user-b">
                                                <div class="dropdown__user">
                                                    <a href="#" class="dropdown__user-label bg-218380">B</a>
                                                    <div class="dropdown__user-nav">
                                                        <a href="#"><i class="icon-Add_User"></i></a>
                                                        <a href="#"><i class="icon-Message"></i></a>
                                                    </div>
                                                    <div class="dropdown__user-info">
                                                        <a href="#">Tesla Motors</a>
                                                        <p>Last post 4 hours ago. Joined Jun 1, 16</p>
                                                    </div>
                                                    <div class="dropdown__user-icons">
                                                        <a href="#"><img src="{{ asset('fonts/icons/badges/Intermediate.svg') }}" alt="user-icon"></a>
                                                        <a href="#"><img src="{{ asset('fonts/icons/badges/Bot.svg') }}" alt="user-icon"></a>
                                                        <a href="#"><img src="{{ asset('fonts/icons/badges/Animal_Lover.svg') }}" alt="user-icon"></a>
                                                    </div>
                                                    <div class="dropdown__user-statistic">
                                                        <div>Threads - <span>1184</span></div>
                                                        <div>Posts - <span>5,863</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/K.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/O.svg') }}" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">{{ count($post->replies) }}</div>
                                    <div class="posts__views">{{ $post->views }}</div>

                                    @php
                                        $now = date_create(date("Y:m:d H:i:s"));
                                        $interaction = date_create($post->updated_at);
                                        $last_activity = date_diff($interaction, $now);

                                        if($last_activity->h < 1) $last_activity_str = $last_activity->i."m";
                                        if($last_activity->d < 1) $last_activity_str = $last_activity->h."h";
                                        if($last_activity->d <= 99 && $last_activity->d > 0) $last_activity_str = $last_activity->d."d";
                                        if($last_activity->d > 99) $last_activity_str = (int)ceil($last_activity/7)."w";


                                    @endphp
                                    <div class="posts__activity">{{ $last_activity_str }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($posts)
                        @foreach ($posts->all() as $post)
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="/blog/post/{{ $post->id }}">
                                                <h3>{{ $post->title }}</h3>
                                            </a>
                                            @if (!is_null($post->tags) || $post->tags != '')
                                                <div class="posts__tags tags">
                                                @php $tags = explode(',', $post->tags); @endphp
                                                @foreach ($tags as $tag)
                                                    <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                                @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>{{ ucwords($post->category) }}</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/A.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/G.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/P.svg') }}" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">{{ count($post->replies) }}</div>
                                    <div class="posts__views">{{ $post->views }}</div>
                                    <div class="posts__activity">{{ getLastActivityTime($post->updated_at) }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection
