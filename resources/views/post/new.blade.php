@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="create">
                <form action="{{ route('blog.post.store') }}" method="POST">
                    @csrf
                    <div class="create__head">
                        <div class="create__title"><img src="{{asset('fonts/icons/main/New_Topic.svg')}}" alt="New topic">Create New Post</div>
                    </div>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('title') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" id="title" />
                    </div>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('category') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="category">{{ __('Select Category') }}</label>
                        <label class="custom-select">
                            <select id="category" name="category">
                                <option hidden ></option>
                                @foreach ($categories->all() as $category)
                                    <option value="{{ $category->value }}" >{{ ucwords($category->value) }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    @if ($errors->has('post'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('post') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section create__textarea">
                        <label class="create__label" for="post">{{ __('Post') }}</label>
                        <textarea class="form-control" id="post" name="post" ></textarea>
                    </div>
                    @if ($errors->has('tags'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('tags') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="tags" >{{ __('Add Tags') }}</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g. nature, science">
                    </div>
                    <div class="create__footer">
                        <button type="reset" href="#" class="create__btn-cansel btn"  >Cancel</button>
                        <button type="submit" class="create__btn-create btn btn--type-02" >{{ __('Create Post') }}</button>
                    </div>
                </form>
            </div>
            <section class="page-posts">
                <div class="container">
                    <div class="card-head text-center">
                        <h3 class="h2">Recent Posts.</h3>
                    </div>
                    <div class="posts">
                        <div class="posts__head">
                            <div class="posts__topic">Post</div>
                            <div class="posts__category">Category</div>
                            <div class="posts__users">By</div>
                            <div class="posts__replies">Replies</div>
                            <div class="posts__views">Views</div>
                            <div class="posts__activity">Activity</div>
                        </div>
                        <div class="posts__body">
                            @if ($recent_posts)
                                @foreach ($recent_posts->all() as $post)
                                    <div class="posts__item">
                                        <div class="posts__section-left">
                                            <div class="posts__topic">
                                                <div class="posts__content">
                                                    <a href="#">
                                                        <h3>{{ $post->title }}</h3>
                                                    </a>
                                                    <div class="posts__tags tags">
                                                        @foreach (explode(',',$post->tags) as $tag)
                                                            <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>{{ ucwords($post->category) }}</a></div>
                                        </div>
                                        <div class="posts__section-right">
                                            <div class="posts__users">
                                                <a href="#" class="category"><i class="bg-368f8b"></i>{{ ucwords($post->user->lastname[0].'. '.$post->user->firstname) }}</a>
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
            </section>
        </div>
    </main>
    @include('widgets.footer')
@endsection
