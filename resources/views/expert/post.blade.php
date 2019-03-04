@extends('expert.layout.profile')

@section('profile-main')
    <div id="" >
        @php
            if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id){
                $backRoute = route('expert.profile');
            }else $backRoute = route('expert');
        @endphp
        <a href="{{  }}" >Go back</a>
    </div>
    <section class="nav">
        <div class="container" >
            <div class="nav__categories js-dropdown">
                <div class="nav__select">
                    <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                        <ul class="dropdown__catalog row">
                            <li class="col-xs-6"><a href="{{ route('expert.posts') }}" class="category"><i class="bg-5dd39e"></i>All</a></li>
                            @if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id)
                                @foreach($categories as $category)
                                    <li class="col-xs-6"><a href="{{ route('expert.posts.viewByCategory', formatUrlString($category->value)) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                @endforeach
                            @else
                                @foreach($categories as $category)
                                    <li class="col-xs-6"><a href="{{ route('expert.guest.posts.viewByCategory', ['id'=>$expert->id, 'category'=>formatUrlString($category->value)]) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="nav__menu js-dropdown">
                <div class="nav__select">
                    <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                    <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                        <ul class="dropdown__catalog">
                            @if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id)
                                <li><a href="{{ route('expert.posts') }}">Latest</a></li>
                                <li><a href="{{ route('expert.posts.popular') }}">Most Liked</a></li>
                            @else
                                <li><a href="{{ route('expert.guest.posts', $expert->id) }}">Latest</a></li>
                                <li><a href="{{ route('expert.guest.posts.popular', $expert->id) }}">Most Liked</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <ul>
                    @if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id)
                        <li class="active" ><a href="{{ route('expert.posts') }}">Latest</a></li>
                        <li><a href="{{ route('expert.posts.popular') }}">Most Liked</a></li>
                    @else
                        <li class="active" ><a href="{{ route('expert.guest.posts', $expert->id) }}">Latest</a></li>
                        <li><a href="{{ route('expert.guest.posts.popular', $expert->id) }}">Most Liked</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
    <section class="posts">
        <div class="container" >
            <div class="posts__head">
                <div class="posts__topic">Post</div>
                <div class="posts__category">Category</div>
                <div class="posts__replies">Comment</div>
                <div class="posts__views">Views</div>
                <div class="posts__activity" id="post_actions"></div>
            </div>
            <div class="posts__body">
                @php $counter = 1; @endphp
                @foreach($posts as $post)
                    <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="{{ route('blog.post', [$post->id, formatUrlString($post->title)]) }}">
                                        <h3>{{ ucwords($post->title) }}</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        @php $tags = explode(',', $post->tags) @endphp
                                        @foreach($tags as $tag)
                                            <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="{{ route('blog.category', formatUrlString($post->category)) }}" class="category"><i class="bg-4436f8"></i>{{ ucfirst($post->category) }}</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__replies">{{ $post->replies->count() }}</div>
                            <div class="posts__views">{{ $post->views }}</div>
                            @if(auth()->user() && $expert->id == auth()->user()->id)
                                <div class="posts__activity" id="post_actions" >
                                    <div>
                                        <a href="{{ route('blog.post.edit', $post->id) }}" class=""><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <div>
                                        <form action="{{ route('expert.post.delete') }}" method="post" class="action-form" id="delete-post-{{ $post->id }}" >
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $post->id }}" >
                                            <button type="submit" style="background: transparent;border: none;box-shadow: none;" ><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @php $counter++; @endphp
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection
