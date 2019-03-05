@extends('user.layout.profile')

@section('profile-main')
    <section class="following">
        <div class="following-header">
            <h4 class="" style="margin:0px;">Experts you follow <span style="float:right; padding-right:10px;"><a href="{{ route('user.following') }}">view all</a></span></h4>
        </div>
        <div class="follow-card-wrapper">
            @foreach($topFollowing as $expert)
                <div class="follow-card hvr-grow">
                    <img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($expert->firstname).'.svg') }}" height="100" width="100" alt="">
                    <p class=""><a href="">{{ ucwords($expert->firstname.' '.$expert->lastname) }}</a></p>
                    <form action="{{ route('expert.unfollow') }}" method="post" class="action-form" id="unfollow-expert-{{ $expert->id }}" >
                        @csrf
                        <input type="hidden" name="redirect" value="{{ $routeName }}" >
                        <input type="hidden" name="id" value="{{ $expert->id }}" >
                        <button type="submit" class="btn" ><i class="fa fa-check"></i> Unfollow</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
    <section class="posts user-questions">
        <h4 class="" style=""><i class="fa fa-question-circle"></i> Questions <span style=""><a href="{{ route('user.questions') }}">view all</a></span></h4>
        <div class="posts__head" style="background:white">
            <div class="posts__topic" style="padding-left: 30px">Question</div>
            <div class="posts__category">Category</div>
            <div class="posts__replies">Comment</div>
            <div class="posts__views">Views</div>
            <div class="posts__activity" id="post_actions"></div>
        </div>
        <div class="posts__body">
            @foreach($recentQuestions as $question)
                <div class="posts__item">
                    <div class="posts__section-left">
                        <div class="posts__topic">
                            <div class="posts__content">
                                <a href="{{ route('question.show', ['id'=>$question->id, 'title'=>formatUrlString($question->title)]) }}">
                                    <h3>{{ ucwords($question->title) }}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="posts__category"><a href="{{ route('question.showbycategory', formatUrlString($question->category)) }}" class="category"><i class="bg-368f8b"></i>{{ ucfirst($question->category) }}</a></div>
                    </div>
                    <div class="posts__section-right">
                        <div class="posts__replies">{{ $question->replies->count() }}</div>
                        <div class="posts__views">{{ $question->views }}</div>
                        <div class="posts__activity" id="post_actions">
                            <form action="{{ route('question.delete') }}" method="post" class="action-form" id="delete-question-{{ $question->id }}" >
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $question->id }}" >
                                <button type="submit" style="background: transparent;border: none;" ><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="questions">
        <div class="table-row">
            <div class="bg-white">
                <h3 class="" style="font-size:20px;">Recent Responses</h3><hr>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="" style="width:80%">Body</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentResponse as $reply)
                        <tr>
                            <td>{{ ucfirst($reply->body) }}</td>
                            <td class="text-center" >
                                @php
                                    if($reply->post->type == 'QUESTION'):
                                        $route = route('question.show', ['id'=>$reply->post->id, 'title'=>formatUrlString($reply->post->title)]);
                                    else:
                                        $route = route('blog.post', ['id'=>$reply->post->id, 'title'=>formatUrlString($reply->post->title)]);
                                    endif;
                                @endphp
                                <a href="{{ $route }}" class=""><i class="fa fa-eye text-light"></i></a>
                            </td>
                            <td class="text-center" >
                                <form action="{{ route('reply.delete') }}" method="post" class="action-form" id="delete-reply-{{ $reply->id }}" >
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $reply->id }}" >
                                    <button type="submit" style="border: none;background: transparent;" ><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection