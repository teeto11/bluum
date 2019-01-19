@extends('layouts.app-temp')

@section('header_scripts')
    <style>
        .topic__footer-likes div a{
            margin-left: 7.5px;
            margin-right: 7.5px;
        }
        #post-unlike i{
            color: red;
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
                        <a href="/blog" class="nav__thread-btn nav__thread-btn--prev"><i class="icon-Arrow_Left"></i>Back</a>
                    </div>
                </div>
            </div>
            <div class="topics">
                <div class="topics__heading">
                    <h2 class="topics__heading-title">{{ ucwords($post->title) }}</h2>
                    <div class="topics__heading-info">
                        <a href="#" class="category"><i class="bg-3ebafa"></i>{{ ucfirst($post->category) }}</a>
                        @if ($post->tags)
                            <div class="tags">
                                @php $tags = explode(',', $post->tags); @endphp
                                @foreach ($tags as $tag)
                                    <a href="#" class="bg-4f80b0">{{ $tag }}</a>
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
                                    <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.$post->user->firstname[0].'.svg') }}" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">{{ ucwords($post->user->firstname." ".$post->user->lastname) }}</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>{{ date("h:ia d M, Y", strtotime($post->created_at)) }}</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>{!! $post->body !!}</p>
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                        <div>
                                            @guest
                                                <a href="#" class="post-like" id="post-like" data-target="{{ $post->id }}" ><i class="icon-Favorite_Topic" ></i></a>
                                            @else
                                                <a href="#" class="post-like" id="{{ $liked ? "post-unlike" : "post-like" }}" data-target="{{ $post->id }}" ><i class="icon-Favorite_Topic" ></i></a>
                                            @endguest
                                            <span id="post-{{$post->id}}-likes" >{{ $post->likes }}</span>
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
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($post->replies as $reply)
                            <div class="topic topic--comment">
                                <div class="topic__head">
                                    <div class="topic__avatar">
                                        <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.ucfirst($reply->user->firstname[0]).'.svg') }}" alt="avatar"></a>
                                    </div>
                                    <div class="topic__caption">
                                        <div class="topic__name">
                                            <a href="#">{{ ucwords($reply->user->lastname.' '.$reply->user->firstname) }}</a>
                                        </div>
                                        <div class="topic__date">
                                            @if ($reply->recipient)
                                                <div class="topic__user topic__user--pos-r">
                                                    <i class="icon-Reply_Fill"></i>
                                                    <a href="#" class="avatar"><img src="{{ asset('fonts/icons/avatars/'.ucfirst($reply->recipient[0]).'.svg') }}" alt="avatar"></a>
                                                    <a href="#" class="topic__user-name">{{ ucwords($reply->recipient) }}</a>
                                                </div>
                                            @endif
                                            <p><i class="icon-Watch_Later"></i>{{ date("h:ia d M, Y", strtotime($reply->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="topic__content">
                                    <div class="topic__text">
                                        <p>{{ $reply->body }}</p>
                                    </div>
                                    <div class="topic__footer">
                                        <div class="topic__footer-likes">
                                            <div>
                                                <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                                <span>{{ $reply->likes }}</span>
                                            </div>
                                            <div>
                                                <a href="#" data-id="{{ $reply->user_id }}" class="reply-comment" data-name"{{ strtolower($reply->user->firstname.' '.$reply->user->lastname) }}" ><i class="icon-Reply_Empty"></i></a>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="topic__footer-share">
                                            <div data-visible="desktop">
                                                <a href="#"><i class="icon-Share_Topic"></i></a>
                                                <a href="#"><i class="icon-Flag_Topic"></i></a>
                                                <a href="#" class="active" ><i class="icon-Already_Bookmarked"></i></a>
                                            </div>
                                            <div data-visible="mobile">
                                                <a href="#"><i class="icon-More_Options"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="topics__title"><i class="icon-Watch_Later"></i>This topic will has been closed.</div>
                <div class="topics__control">
                    <a href="#" class="btn"><i class="icon-Bookmark"></i>Bookmark</a>
                    <a href="#" class="btn"><i class="icon-Share_Topic"></i>Share</a>
                    <a href="#" class="btn btn--type-02" data-visible="desktop"><i class="icon-Reply_Fill"></i>Reply</a>
                </div>
                <div class="topics__title">Suggested Posts</div>
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Post</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Written By</div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script>
        let running = false;

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
@endsection
