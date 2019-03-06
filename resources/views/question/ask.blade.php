@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />

    <style>
        @media (max-width:787px){
            .container{
                width:100% !important;
            }
        }
    </style>
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="create">
                <form action="{{ route('question.store') }}" method="post" >
                    @csrf
                    <div class="">
                        <div class="create__title"><img src="{{ asset('fonts/icons/main/New_Topic.svg') }}" alt="New topic">Ask your question</div>
                    </div><hr>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('title') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="" for="question">Question</label>
                        <input type="text" class="form-control" name="title" id="question" />
                    </div>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('category') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class=" for="category">Select Category</label>
                        <label class="custom-select">
                            <select id="category" name="category" >
                                <option hidden></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->value }}" >{{ ucfirst($category->value) }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('description') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section create__textarea">
                        <label class="" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    @if ($errors->has('tags'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('tags') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="" for="tags">Add Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g. nature, science">
                    </div>
                    <div class="create__footer">
                        <button type="reset" name="reset" class="create__btn-cansel btn">{{ __('Cancel') }}</button>
                        <button type="submit" name="button" class="create__btn-create btn btn--type-02" >{{ __('Ask') }}</button>
                    </div>
                </form>
            </div>
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
                            @php $counter = 1; @endphp
                            @foreach ($popular_questions as $question)
                                <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                                    <div class="posts__section-left">
                                        <div class="posts__topic">
                                            <div class="posts__content">
                                                <a href="/question/{{ $question->id }}/{{ formatUrlString($question->title) }}">
                                                    <h3>{{ $question->title }}</h3>
                                                </a>
                                                <div class="posts__tags tags">
                                                    @php $tags = explode(',', $question->tags) @endphp
                                                    @foreach($tags as $tag)
                                                        <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts__category"><a href="/questions/category/{{ $question->category }}" class="category"><i class="bg-368f8b"></i>{{ ucfirst($question->category) }}</a></div>
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
                                @php $counter++ @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    @include('widgets.footer')
@endsection
@section('scripts')
    <script>

    </script>
@endsection
