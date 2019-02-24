@extends('expert.layout.profile')

@section('profile-main')
    <section class="summary">
        @if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id)
            <a href="{{ route('expert.posts') }}" class="posts" ><i class="fa fa-bookmark-o"></i>Posts<br>{{ $totalPost }}</a>
            <a href="{{ route('expert.answers') }}" class="question" ><i class="fa fa-question-circle"></i>Answers<br>{{ $totalAnswers }}</a>
        @else
            <a href="{{ route('expert.guest.posts', ['id'=>$expert->id]) }}" class="posts" ><i class="fa fa-bookmark-o"></i>Posts<br>{{ $totalPost }}</a>
            <a href="{{ route('expert.guest.answers', ['id'=>$expert->id]) }}" class="question" ><i class="fa fa-question-circle"></i>Answers<br>{{ $totalAnswers }}</a>
        @endif
    </section>
    <section class="page-posts">
        <div class="container post-container">
            <div class="card-head">
                <h3 class="">Recent Posts.</h3>
            </div>
<<<<<<< HEAD
            <div class="profile-main">
                <section class="summary">
					<a href="post" class="posts" type="submit" formaction="experts-post.html"><i class="fa fa-bookmark-o"></i>Posts<br>10</a>
					<a href="answers" class="question" type="submit" formaction="experts-answers.html"><i class="fa fa-question-circle"></i>Answers<br>10</a>
				</section>
                <section class="page-posts">
                    <div class="container post-container">
                        <div class="card-head">
                            <h3 class="">Recent Posts.</h3>
                        </div>
                        <div class="posts bg-success">
                            <div class="posts__head" style="padding-left:10px;padding-right: 10px;">
                                <div class="posts__topic">Post</div>
                                <div class="posts__category">Category</div>
                                <div class="posts__users">Tags</div>
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
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
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
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
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
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
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
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
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
                                        <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>Politics</a></div>
                                        <div class="posts__replies">441</div>
                                        <div class="posts__views">3.1k</div>
                                        <div class="posts__activity">6h</div>
=======
            <div class="posts bg-success" style="margin-bottom: 2rem;" >
                <div class="posts__head" style="padding-left:10px;padding-right: 10px;">
                    <div class="posts__topic">Post</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__replies">Likes</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
                    @php $counter = 1; @endphp
                    @foreach($recentPost as $post)
                    <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3>{{ ucwords($post->title) }}</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        @php $tags = explode(',', $post->tags) @endphp
                                        @foreach($tags as $tag)
                                            <a href="#" class="bg-4f80b0">{{ $tag }}</a>
                                        @endforeach
>>>>>>> 87c2220be8b8bd57a2871d65506b26a72606c4cc
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>{{ ucfirst($post->category) }}</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__replies" >{{ $post->likes }}</div>
                            <div class="posts__replies">{{ $post->replies->count() }}</div>
                            <div class="posts__views">{{ $post->views }}</div>
                            <div class="posts__activity">{{ getLastActivityTime($post->updated_at) }}</div>
                        </div>
                    </div>
                        @php $counter++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="questions" style="margin-top: 2rem" >
        <div class="table-row">
            <div class="bg-white">
                <h3 class="" style="font-size:20px;">Recent Responses</h3><hr>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="" style="width:80%">Body</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentResponses as $response)
                        <tr>
                            <td>{{ ucfirst($response->body) }}</td>
                            <td class="text-right" >
                                @php
                                if($response->post->type == 'QUESTION'):
                                    $route = route('question.show', ['id'=>$response->post->id, 'title'=>formatUrlString($response->post->title)]);
                                else:
                                    $route = route('blog.post', ['id'=>$response->post->id, 'title'=>formatUrlString($response->post->title)]);
                                endif;
                                @endphp
                                <a href="{{ $route }}" class=""><i class="fa fa-eye text-light"></i></a>
                            </td>
                            <td class="text-right" >
                                @if(auth()->user() && auth()->user()->role == 'EXPERT' && auth()->user()->id == $expert->id)
                                    <form action="{{ route('expert.post.reply.delete') }}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $response->id }}" >
                                        <button type="submit" style="background: transparent;border: none" ><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                    <a href="" class=""></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection