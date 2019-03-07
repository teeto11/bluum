@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <style>
        #post-unlike i{
            color: red;
        }
        .reply-unlike i{
            color: red!important;
        }
        #reply-comment{
            margin-top: 1.5rem;
        }
        #reply-comment a.close{
            font-size: 3rem;
        }
        .correct-answer{
            border: 1px solid #3c763d;
        }
        @media (max-width:787px){
            .container{
                width:100% !important;
            }
        }
        @media only screen and (max-width: 1039px){
            .topic.topic--comment {
                margin-left: 0px !important;
            }
            .creply{
                margin-left:15px !important;
            }
        }

        .child-comment-wrapper {
            max-height:25vh;
            overflow-y:auto;
        }
        .topic--comment-wrapper {
            max-height:150vh;
            overflow-y:auto;
        }
        .topic.topic--comment {
            margin-top: 10px !important;
        }
    </style>
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <main>
        <div class="container">
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <a href="/questions" class="nav__thread-btn nav__thread-btn--prev"><i class="icon-Arrow_Left"></i>Back</a>
                    </div>
                </div>
            </div>
            <div class="topics">
                <div class="topics__heading">
                    <h2 class="topics__heading-title">{{ $question->title }}</h2>
                    <div class="topics__heading-info">
                        <a href="{{ route('question.showbycategory', formatUrlString($question->category)) }}" class="category"><i class="bg-3ebafa"></i>{{ ucfirst($question->category) }}</a>
                        @if ($question->tags)
                            <div class="tags">
                                @php $tags = explode(',', $question->tags); @endphp
                                @foreach ($tags as $tag)
                                    <a href="{{ route('blog.tag', ['tag'=>$tag]) }}" class="bg-4f80b0">{{ $tag }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="topics__body">
                    <div class="topics__content">
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($question->user->firstname).'.svg') }}" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">{!! getInitials($question->user, true) !!}</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>{{ date("h:ia d M, Y", strtotime($question->created_at)) }}</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>{!! $question->body !!}</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            @guest
                                                <a href="#" class="post-like" id="post-like" data-target="{{ $question->id }}" ><i class="icon-Favorite_Topic" ></i></a>
                                            @else
                                                <a href="#" class="post-like" id="{{ $liked ? "post-unlike" : "post-like" }}" data-target="{{ $question->id }}" ><i class="icon-Favorite_Topic" ></i></a>
                                            @endguest
                                            <span id="post-{{$question->id}}-likes" >{{ $question->likes }}</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Share_Topic"></i></a>
                                            <a href="#"><i class="icon-Flag_Topic"></i></a>
                                            <a href="#"><i class="icon-Bookmark"></i></a>
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($correctAnswer))
                                    <hr>
                                    <div class="topics__title"><i class="icon-Watch_Later"></i>This topic has been closed.</div>
                                    <div class="topics__control">
                                        <a href="#" class="btn"><i class="icon-Bookmark"></i>Bookmark</a>
                                        <a href="#" class="btn"><i class="icon-Share_Topic"></i>Share</a>
                                    </div>
                                @else
                                    <div id="comment" >
                                        <form action="{{ route('question.answer') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $question->id }}" >
                                            @if ($errors->has('body'))
                                                <div class="invalid-feedback text-danger" role="alert">
                                                    <p><strong>{{ $errors->first('body') }}</strong></p>
                                                </div>
                                            @endif
                                            <div class="form-group" >
                                                <textarea class="form-control" name="body" style="resize: none" rows="5" ></textarea>
                                            </div>
                                            <div class="form-group text-right" >
                                                <input type="submit" class="btn btn-success" value="Answer" >
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            @if(isset($correctAnswer))
                                @php
                                    $answer = $correctAnswer;
                                    $r_user = $answer->user;
                                    if(auth()->user()) $userLikedReply = userLikedReply($answer->id);
                                @endphp
                                <div class="topic topic--comment correct-answer" id="reply-{{ $answer->id }}" >
                                    <div class="topic__head">
                                        <div class="topic__avatar">
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($r_user->firstname).'.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div class="topic__caption">
                                            <div class="topic__name">
                                                <a href="#">{!! getInitials($r_user, true) !!}</a>
                                            </div>
                                            <div class="topic__date"><i class="icon-Watch_Later"></i>{{ formatTime($answer->created_at) }}</div>
                                        </div>
                                    </div>
                                    <div class="topic__content">
                                        <div class="topic__text">
                                            <p>{{ $answer->body }}.</p>
                                        </div>
                                        <div class="topic__footer">
                                            <div class="topic__footer-likes">
                                                <div>
                                                    <a href="#" class="up-vote" data-target="{{ $answer->id }}" ><i class="icon-Upvote"></i></a>
                                                    <span>{{ $answer->upVote->count() }}</span>
                                                </div>
                                                <div>
                                                    <a href="#" class="down-vote" data-target="{{ $answer->id }}" ><i class="icon-Downvote"></i></a>
                                                    <span>{{ $answer->downVote->count() }}</span>
                                                </div>
                                                <div>
                                                    @guest
                                                        <a href="#" class="reply-like" data-id="{{ $answer->id }}" ><i class="icon-Favorite_Topic"></i></a>
                                                    @else
                                                        <a href="#" class="{{ ($userLikedReply) ? __('reply-unlike') : __('reply-like') }}" data-id="{{ $answer->id }}" ><i class="icon-Favorite_Topic"></i></a>
                                                    @endguest
                                                    <span id="reply-{{ $answer->id }}-likes" >{{ $answer->likes }}</span>
                                                </div>
                                                <div>
                                                    <a href="#" class="reply-answer" data-id="{{ $answer->id }}" data-parent="{{ $answer->id }}" ><i class="icon-Reply_Empty"></i></a>
                                                    <span>{{ $question->replies->where('parent_reply', $answer->id)->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach($question->replies->where('parent_reply', $answer->id) as $a_reply)
                                            <div class="creply" id="reply-{{ $a_reply->id }}" >
                                                <div class="topic__head">
                                                    <div class="topic__avater">
                                                        <a href="#" class="avatar" style="margin-right:30px;"><img src="{{ asset('fonts/icons/avatars/'.ucfirst($a_reply->user->firstname[0]).'.svg') }}" alt="avatar"></a>
                                                    </div>
                                                    <div class="topic__caption">
                                                        <div class="topic__name">
                                                            <a href="">{!! getInitials($a_reply->user) !!}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="topic__content">
                                                    <p class=""><strong>{{ $a_reply->recipient }}</strong> {{ $a_reply->body }}. <a href="#" class="reply-answer" data-id="{{ $a_reply->id }}" data-parent="{{ $answer->id }}" ><i class="icon-Reply_Empty"></i></a></p>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                    <div class="text-right">
                                        <p class="text-success" style="font-weight: bold;" >CORRECT ANSWER</p>
                                    </div>
                                </div>
                            @endif
                            @foreach ($question->replies->where('parent_reply', null)->where('correct', false) as $answer)
                                @php
                                    $r_user = $answer->user;
                                    if(auth()->user()) $userLikedReply = userLikedReply($answer->id);
                                @endphp
                                <div class="topic topic--comment" id="reply-{{ $answer->id }}" >
                                    <div class="topic__head">
                                        <div class="topic__avatar">
                                            <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.getFirstLetterUppercase($r_user->firstname).'.svg') }}" alt="avatar"></a>
                                        </div>
                                        <div class="topic__caption">
                                            <div class="topic__name">
                                                <a href="#">{!! getInitials($r_user, true) !!}</a>
                                            </div>
                                            <div class="topic__date"><i class="icon-Watch_Later"></i>{{ formatTime($answer->created_at) }}</div>
                                        </div>
                                    </div>
                                    <div class="topic__content">
                                        <div class="topic__text">
                                            <p>{{ $answer->body }}.</p>
                                        </div>
                                        <div class="topic__footer">
                                            <div class="topic__footer-likes">
                                                <div>
                                                    <a href="#" class="up-vote" data-target="{{ $answer->id }}" ><i class="icon-Upvote"></i></a>
                                                    <span>{{ $answer->upVote->count() }}</span>
                                                </div>
                                                <div>
                                                    <a href="#" class="down-vote" data-target="{{ $answer->id }}" ><i class="icon-Downvote"></i></a>
                                                    <span>{{ $answer->downVote->count() }}</span>
                                                </div>
                                                <div>
                                                    @guest
                                                        <a href="#" class="reply-like" data-id="{{ $answer->id }}" ><i class="icon-Favorite_Topic"></i></a>
                                                    @else
                                                        <a href="#" class="{{ ($userLikedReply) ? __('reply-unlike') : __('reply-like') }}" data-id="{{ $answer->id }}" ><i class="icon-Favorite_Topic"></i></a>
                                                    @endguest
                                                    <span id="reply-{{ $answer->id }}-likes" >{{ $answer->likes }}</span>
                                                </div>
                                                <div>
                                                    <a href="#" class="reply-answer" data-id="{{ $answer->id }}" data-parent="{{ $answer->id }}" ><i class="icon-Reply_Empty"></i></a>
                                                    <span>{{ $question->replies->where('parent_reply', $answer->id)->count() }}</span>
                                                </div>
                                            </div>
                                            <div class="topic__footer-share">
                                                <div data-visible="desktop">
                                                    <a href="#"><i class="icon-Share_Topic"></i></a>
                                                    <a href="#"><i class="icon-Flag_Topic"></i></a>
                                                    <a href="#" class="active"><i class="icon-Already_Bookmarked"></i></a>
                                                </div>
                                                <div data-visible="mobile">
                                                    <a href="#"><i class="icon-More_Options"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="child-comment-wrapper">
                                            @foreach($question->replies->where('parent_reply', $answer->id) as $a_reply)
                                                <div class="creply" id="reply-{{ $a_reply->id }}" >
                                                    <div class="topic__head">
                                                        <div class="topic__avater">
                                                            <a href="#" class="avatar" style="margin-right:30px;"><img src="{{ asset('fonts/icons/avatars/'.ucfirst($a_reply->user->firstname[0]).'.svg') }}" alt="avatar"></a>
                                                        </div>
                                                        <div class="topic__caption">
                                                            <div class="topic__name">
                                                                <a href="" class="">{!! getInitials($a_reply->user ) !!}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="topic__content">
                                                        <p><strong>{!! $a_reply->recipient !!}</strong> {{ $a_reply->body }}. <strong></strong> <a href="#" class="reply-answer" data-id="{{ $a_reply->id }}" data-parent="{{ $answer->id }}" ><i class="icon-Reply_Empty"></i></a></p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                    @auth
                                        @if(!isset($correctAnswer) && auth()->user()->id == $question->user_id )
                                            <div class="text-right">
                                                <form method="post" action="{{ route('question.answer.markAsCorrect') }}" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $answer->id }}" >
                                                    <button type="submit" class=" btn btn-success" style="font-weight: bold;" >MARK AS CORRECT</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="topics__title">Suggested Questions</div>
                <hr>
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Post</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Asked By</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
                    @php $counter = 1; @endphp
                    @foreach($related as $r_question)
                        <div class="posts__item {{ ($counter%2 == 0) ? 'bg-f2f4f6' : '' }}">
                            <div class="posts__section-left">
                                <div class="posts__topic">
                                    <div class="posts__content">
                                        <a href="/question/{{ $r_question->id }}/{{ formatUrlString($r_question->title) }}">
                                            <h3>{{ $r_question->title }}</h3>
                                        </a>
                                        <div class="posts__tags tags">
                                            @php $r_tags = explode(',', $r_question->tags); @endphp
                                            @foreach($r_tags as $r_tag)
                                                <a href="#" class="bg-36b7d7">{{ $r_tag }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>{{ ucfirst($r_question->category) }}</a></div>
                            </div>
                            <div class="posts__section-right">
                                <div class="posts__users"><a href="#" class="category"><i class="bg-368f8b"></i>{{ ucfirst($r_question->user->firstname) }}</a></div>
                                <div class="posts__replies">{{ count($r_question->replies) }}</div>
                                <div class="posts__views">{{ $r_question->views }}</div>
                                <div class="posts__activity">{{ getLastActivityTime($r_question->updated_at) }}</div>
                            </div>
                        </div>
                        @php $counter++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection
@section('scripts')
    <script>
        let running = false;

        $(".reply-like, .reply-unlike").click(function (e) {

            e.preventDefault();
            if(running) {
                alert("Don't click multiple times");
                return false;
            }

            running = true;
            let url = '';
            let likeBtn = $(this);
            let reply_id = $(this).attr('data-id');
            if (likeBtn.attr('class') === 'reply-like') url = '{{ route('reply.like') }}'; else url = '{{ route('reply.unlike') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: url,
                data: { reply_id:reply_id },
            }).done(function(data){
                console.log(data);
                if(data !== 'false' && data !== ''){
                    $(`#reply-${reply_id}-likes`).html(data);
                    if(likeBtn.attr('class') === "reply-like") likeBtn.attr("class", "reply-unlike"); else likeBtn.attr("class", "reply-like");
                    running = false;
                }
            }).fail(function(e){
                if(e.status === 401) alert('You need to be logged in');
            });
        });

        $(".post-like").click(function(e){

            e.preventDefault();

            if(running) {
                alert("Don't click multiple times");
                return false;
            }

            running = true;
            let url = "";
            let likeBtn = $(this);
            if(likeBtn.attr('id') === "post-like") url = "{{ route('post.like') }}"; else url = "{{ route('post.unlike') }}";
            let post_id = $(this).attr('data-target');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: url,
                data: { post_id:post_id },
            }).done(function(data){
                if(data !== 'false' && data !== ''){
                    $(`#post-${post_id}-likes`).html(data);
                    if(likeBtn.attr('id') === "post-like") likeBtn.attr("id", "post-unlike"); else likeBtn.attr("id", "post-like");
                    running = false;
                }
            }).fail(function(e){
                if(e.status === 401) alert('You need to be logged in');
            });
        });
    </script>
    <script>
        $(".reply-answer").click(function (e) {

            e.preventDefault();
            $('#reply-comment').remove();
            let recipient = $(this).attr('data-id');
            let questionId = '{{ $question->id }}';
            let parentId = $(this).attr('data-parent');

            let replyComment = `
                <div id="reply-comment" >
                    <form action="{{ route('question.answer') }}" method="post" >
                        @csrf
                <div class="form-group" style="text-align: right;" >
                    <a href="#" class="close" >
                        <span style="color: red;font-weight: bold;" >&times;</span>
                    </a>
                </div>
                <input type="hidden" name="recipient" value="${recipient}" >
                        <input type="hidden" name="post_id" value="${questionId}" >
                        <div class="form-group" >
                            <textarea class="form-control" name="body" style="resize: none;" ></textarea>
                        </div>
                        <div class="form-group text-right" >
                            <input type="submit" class="btn btn-success" value="Reply" >
                        </div>
                    </form>
                </div>
            `;

            $("#reply-"+parentId).append(replyComment);
        });

        $(document).on('click', '#reply-comment .close', function (e) {

            e.preventDefault();
            $("#reply-comment").remove();
        });
    </script>

    <script>

        $('.up-vote, .down-vote').click(function (e) {

            e.preventDefault();
            if(running){
                alert("Don't click multiple times");
                return false;
            }

            running = true;
            let url = '';

            if($(this).hasClass('up-vote')) url = '{{ route('question.answer.up-vote') }}';
            if($(this).hasClass('down-vote')) url = '{{ route('question.answer.down-vote') }}';

            let answerId = $(this).attr('data-target');
            let voteBtn = $(this);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: {answerId: answerId},
                url: url,
            }).done(function (res) {
                if(res !== 'false') voteBtn.next().html(res);
                running = false;
            }).fail(function(e){
                if(e.status === 401) alert('You need to be logged in');
            });
        });
    </script>
@endsection
