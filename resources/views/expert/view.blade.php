@extends('expert.layout.profile')

@section('profile-main')
    <section class="summary">
        <a href="{{ route('expert.posts', $expert->id) }}" class="posts" ><i class="fa fa-bookmark-o"></i>Posts<br>{{ $totalPost }}</a>
        <a href="{{ route('expert.answers', $expert->id) }}" class="question" ><i class="fa fa-question-circle"></i>Answers<br>{{ $totalAnswers }}</a>
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
    <section class="questions">
        <div class="table-row">
            <div class="bg-white">
                <h3 class="" style="font-size:20px;">Recent Responses</h3><hr>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="" style="width:80%">Title</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Which movie have you watched most recently</td>
                        <td><a href="view-post.html" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>How to kill thanos  </td>
                        <td><a href="" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>stuff</td>
                        <td><a href="" class=""><i class="fa fa-eye text-light"></i></a> <a href="" class=""><i class="fa fa-trash"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection