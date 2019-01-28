@extends('layouts.app-temp')

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="create">
                <form action="{{ route('question.store') }}" method="post" >
                    @csrf
                    <div class="create__head">
                        <div class="create__title"><img src="{{ asset('fonts/icons/main/New_Topic.svg') }}" alt="New topic">Ask your question</div>
                    </div>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('title') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="question">Question</label>
                        <input type="text" class="form-control" name="title" id="question" />
                    </div>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('category') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="category">Select Category</label>
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
                        <label class="create__label" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    @if ($errors->has('tags'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong><p>{{ $errors->first('tags') }}</p></strong>
                        </span>
                    @endif
                    <div class="create__section">
                        <label class="create__label" for="tags">Add Tags</label>
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
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Current news and discussion</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/A.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/G.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/P.svg" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">31</div>
                                    <div class="posts__views">14.5k</div>
                                    <div class="posts__activity">13d</div>
                                </div>
                            </div>
                            <div class="posts__item bg-f2f4f6">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Get your username drawn by the other users of unity! or a drawing based on what you do</h3>
                                            </a>
                                            <div class="posts__tags tags">
                                                <a href="#" class="bg-4f80b0">gaming</a>
                                                <a href="#" class="bg-424ee8">nature</a>
                                                <a href="#" class="bg-36b7d7">entertainment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>Video</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/L.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/T.svg" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">252</div>
                                    <div class="posts__views">396</div>
                                    <div class="posts__activity">13m</div>
                                </div>
                            </div>
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Which movie have you watched most recently?</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-3ebafa"></i> Exchange</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/E.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/I.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/R.svg" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">207</div>
                                    <div class="posts__views">7.5k</div>
                                    <div class="posts__activity">41m</div>
                                </div>
                            </div>
                            <div class="posts__item posts__item--bg-gradient">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3><span>This post contails spoiler about</span> Star Wars Movie.</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-777da7"></i> Q&amp;As</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/F.svg" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">2.3k</div>
                                    <div class="posts__views">2.0k</div>
                                    <div class="posts__activity">1h</div>
                                </div>
                            </div>
                            <div class="posts__item">
                                <div class="posts__section-left">
                                    <div class="posts__topic">
                                        <div class="posts__content">
                                            <a href="#">
                                                <h3>Take a picture of what you’re doing at this very moment</h3>
                                            </a>
                                            <div class="posts__tags tags">
                                                <a href="#" class="bg-ec008c">selfie</a>
                                                <a href="#" class="bg-7cc576">camera</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts__category"><a href="#" class="category"><i class="bg-c6b38e"></i> Pets</a></div>
                                </div>
                                <div class="posts__section-right">
                                    <div class="posts__users">
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/C.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/U.svg" alt="avatar"></a>
                                        </div>
                                        <div>
                                            <a href="#" class="avatar"><img src="./assets/fonts/icons/avatars/I.svg" alt="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="posts__replies">441</div>
                                    <div class="posts__views">3.1k</div>
                                    <div class="posts__activity">6h</div>
                                </div>
                            </div>
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
