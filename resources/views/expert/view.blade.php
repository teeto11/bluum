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