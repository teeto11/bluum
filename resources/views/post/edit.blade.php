@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="create">
                <form action="{{ route('blog.post.update', $post->id) }}" method="POST">
                    @method('PUT')
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
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" />
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
                                    <option value="{{ $category->value }}" {{ ($category->value == $post->category) ? 'selected' : '' }} >{{ ucwords($category->value) }}</option>
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
                        <textarea class="form-control" id="post" name="post" >{{ $post->body }}</textarea>
                    </div>
                    @if ($errors->has('tags'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('tags') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="tags" >{{ __('Add Tags') }}</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g. nature, science" value="{{ $post->tags }}">
                    </div>
                    <div class="create__footer">
                        <button type="reset" href="#" class="create__btn-cansel btn"  >Cancel</button>
                        <button type="submit" class="create__btn-create btn btn--type-02" >{{ __('Update Post') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection
