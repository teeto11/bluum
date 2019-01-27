@extends('layouts.app-temp')

@section('header_scripts')
<style>
    p{ margin: 0; }
    .posts__content{ width: 100%; }
</style>
@endsection
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
                                <li class="col-xs-6"><a href="/blog" class="category"><i class="bg-5dd39e"></i>All</a></li>
                            @if ($categories)
                                    @foreach ($categories as $category)
                                        <li class="col-xs-6"><a href="/blog/{{ urlencode($category->value) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
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
                                    <a href="/blog/tag/{{ urlencode($tag->value) }}" class="bg-4f80b0">{{ $tag->value }}</a>
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
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Most Liked</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul>
                        <li class="active"><a href="#">Latest</a></li>
                        <li><a href="/blog/unread">Unread</a></li>
                        <li><a href="/blog/popular">Most Liked</a></li>
                    </ul>
                </div>
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Post</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Posted By</div>
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
                                                <h3><i><img src="{{ asset('fonts/icons/main/Pinned.svg') }}" alt="Pinned"></i>{{ ucwords($post->title) }}</h3>
                                            </a>
                                            <p class="ellipsis" >{!! $post->body !!}</p>
                                            <div class="posts__tags tags">
                                                @php $tags = explode(',', $post->tags); @endphp
                                                @foreach ($tags as $tag)
                                                    <a href="/blog/tag/{{ urlencode($tag) }}" class="bg-4f80b0">{{ $tag }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>{{ $post->category }}</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users js-dropdown">
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'. strtoupper($post->user->firstname[0]).'.svg') }}" alt="avatar" data-dropdown-btn="user-b"></a>
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
                                            <p >{{ ucfirst($post->user->lastname) }}</p>
                                        </div>
                                    </div>
                                    <div class="posts__replies">{{ count($post->replies) }}</div>
                                    <div class="posts__views">{{ $post->views }}</div>
                                    <div class="posts__activity">{{ getLastActivityTime($post->updated_at) }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($posts)
                        @php $counter = 1; @endphp
                        @foreach ($posts->all() as $post)
                            <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="/blog/post/{{ $post->id }}/{{ formatUrlString($post->title) }}">
                                                <h3>{{ ucwords($post->title) }}</h3>
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
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.strtoupper($post->user->firstname[0]).'.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <p >{{ ucfirst($post->user->lastname) }}</p>
                                        </div>
                                    </div>
                                    <div class="posts__replies">{{ count($post->replies) }}</div>
                                    <div class="posts__views">{{ $post->views }}</div>
                                    <div class="posts__activity">{{ getLastActivityTime($post->updated_at) }}</div>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @endforeach
                        {{ $posts->links() }}
                    @endif
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection
