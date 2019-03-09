@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <style>
        @media (max-width:1248px){
            .mini-header{
                opacity:0.4 !important;
            }
        }
    </style>
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="search-post-wrapper">
		<div class="container">
			<h5><span>Search Result for "<span>{{ $query }}</span>"</span></h5><hr>
			<div class="posts-subwrapper">
				<div class="main">
					<div class="row">
                        @if($result->total() < 1)
                            <div>
                                <p>Nothing was found</p>
                            </div>
                        @endif
						@foreach($result as $post)
                            @php $urlParam = ['id'=>$post->id, 'title'=>formatUrlString($post->title)]; @endphp
                            <div class="content-wrapper" style="width:100%;">
                                <div class="image-wrapper">
                                    <img src="/storage/post_cover_image/{{ $post->cover_img }}" width="100%" alt="">
                                </div>
                                <div class="post-details">
                                    <p class="mini-header"><span style="color:#fc5305">{{ formatTime($post->created_at) }}</span> - <span class="medicine"><a href="{{ route('blog.category', formatUrlString($post->category)) }}" style="color:#1ea059;">{{ ucfirst($post->category) }}</a></span> - <span>{{ $post->replies->count() }} comments</span> - <span class="views" style="color:#fc5305;"> {{ $post->views }} view{{ ($post->views > 1) ? 's' : '' }} </span></p>
                                    <p class="post-header"><a href="{{ ($post->type == 'POST') ? route('blog.post', $urlParam) : route('question.show', $urlParam) }}" ><b>{{ ucwords($post->title) }}</b></a> <span class="views" style="float: right; opacity: .6;font-size:15px;"><span class="activity" style="">last updated</span> {{ getLastActivityTime($post->updated_at) }}</span> </p>
                                    <p class="mini-text" style="font-size:14px;">{{ ucfirst($post->body) }}</p>
                                    <p class="buttons"><span class="" style="float: left">Posted by: <a href="{{ route('expert.show', $post->user->id) }}" class="name">{{ ucwords($post->user->firstname.' '.$post->user->lastname) }}</a></span> <a href="{{ ($post->type == 'POST') ? route('blog.post', $urlParam) : route('question.show', $urlParam) }}" class="btn-sm read"><i class="fa fa-book"></i>Read more</a> </p>
                                </div>
                            </div>
                        @endforeach
                        {{ $result->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script>
        $('img').on("error", function() {
            $(".image-wrapper").css({"display":"none"}),
                $(".post-details").css({"width":"100%"});
        })
    </script>
@endsection