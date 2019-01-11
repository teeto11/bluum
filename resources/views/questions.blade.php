@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                            <ul class="dropdown__catalog row">
                                @foreach ($categories as $category)
                                    <li class="col-xs-6"><a href="/questions/category/{{ preg_replace('/\s+/', '-', $category->value) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="tags">Tags</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                <a href="#" class="bg-424ee8">nature</a>
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
                    <div class="posts__topic">Question</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Experts</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
                    @foreach ($questions as $question)
                        <div class="posts__item">
                            <div class="posts__section-left">
                                <div class="posts__topic">
                                    <div class="posts__content">
                                        <a href="/question/{{ $question->id }}">
                                            <h3>{{ $question->title }}</h3>
                                        </a>
                                        <div class="posts__tags tags">
                                            @foreach (explode(',', $question->tags) as $tag)
                                                <a href="#" class="bg-36b7d7">{{ $tag }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>{{ ucfirst($question->category) }}</a></div>
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
                                <div class="posts__replies">{{ count($question->replies) }}</div>
                                <div class="posts__views">{{ $question->views }}</div>
                                <div class="posts__activity">{{ getLastActivityTime($question->updated_at) }}</div>
                            </div>
                        </div>
                    @endforeach
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection
