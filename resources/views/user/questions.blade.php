@extends('user.layout.profile')

@section('profile-main')
    <section class="nav">
        <div class="nav__categories js-dropdown">
            <div class="nav__select">
                <div class="btn-select" data-dropdown-btn="categories">All Categories</div>
                <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                    <ul class="dropdown__catalog row">
                        <li class="col-xs-6"><a href="{{ route('user.questions') }}" class="category"><i class="bg-c49bbb"></i>All</a></li>
                        @foreach($categories as $category)
                            <li class="col-xs-6"><a href="{{ route('user.viewquestionsbycategory', formatUrlString($category->value)) }}" class="category"><i class="bg-5dd39e"></i>{{ ucfirst($category->value) }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="nav__menu js-dropdown">
            <div class="nav__select">
                <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                    <ul class="dropdown__catalog">
                        <li><a href="{{ route('user.questions') }}">Latest</a></li>
                        <li><a href="{{ route('user.questions.popular') }}">Most Liked</a></li>
                    </ul>
                </div>
            </div>
            <ul>
                <li class="active"><a href="{{ route('user.questions') }}">Latest</a></li>
                <li><a href="{{ route('user.questions.popular') }}">Most Liked</a></li>
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
            @foreach($posts as $question)
                <div class="posts__item">
                    <div class="posts__section-left">
                        <div class="posts__topic">
                            <div class="posts__content">
                                <a href="{{ route('question.show', [$question->id, formatUrlString($question->title)]) }}">
                                    <h3>{{ ucwords($question->title) }}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="posts__category"><a href="{{ route('question.showbycategory', formatUrlString($question->category)) }}" class="category"><i class="bg-368f8b"></i>{{ ucfirst($question->category) }}</a></div>
                    </div>
                    <div class="posts__section-right">
                        <div class="posts__replies">{{ $question->replies->where('parent_reply', null)->count() }}</div>
                        <div class="posts__views">{{ $question->views }}</div>
                        <div class="posts__activity" id="post_actions">

                        </div>
                        <div>
                            <form action="{{ route('question.delete') }}" method="post" >
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $question->id }}" >
                                <input type="hidden" name="redirect" value="{{ $routeName }}" >
                                <button type="submit" style="background: transparent;border: none;" ><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{ $posts->links() }}
            @endforeach
        </div>
    </section>
@endsection