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
                                <li class="col-xs-6"><a href="/questions" class="category"><i class="bg-5dd39e"></i>All</a></li>
                            @foreach ($categories as $category)
                                    <li class="col-xs-6"><a href="/questions/category/{{ urlencode($category->value) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="tags">Tags</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                @foreach($top_tags as $tag)
                                    <a href="/questions/tag/{{ urlencode($tag->value) }}" class="bg-36b7d7">{{ $tag->value }}</a>
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
                                <li><a href="{{ route('questions') }}">Latest</a></li>
                                <li><a href="{{ route('question.unread') }}">Unread</a></li>
                                <li><a href="{{ route('question.popular') }}">Most Liked</a></li>
                                <li><a href="{{ route('question.following') }}">Following</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul>
                        <li class="filter-link" id="latest-link" ><a href="{{ route('questions') }}">Latest</a></li>
                        <li class="filter-link" id="unread-link" ><a href="{{ route('question.unread') }}">Unread</a></li>
                        <li class="filter-link" id="popular-link" ><a href="{{ route('question.popular') }}">Most Liked</a></li>
                        <li class="filter-link" id="following-link" ><a href="{{ route('question.following') }}">Following</a></li>
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
                    @php $counter=1; @endphp
                    @foreach ($posts as $question)
                        <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                            <div class="posts__section-left">
                                <div class="posts__topic">
                                    <div class="posts__content">
                                        <a href="/question/{{ $question->id }}/{{ formatUrlString($question->title) }}">
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
                        @php $counter++; @endphp
                    @endforeach
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script>
        let activeLink = '{{ $active_link }}';
        $("#"+activeLink).addClass('active');
    </script>
@endsection
