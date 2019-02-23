@extends('expert.layout.profile')

@section('profile-main')
    <section class="questions">
        <div class="table-row">
            <div class="table-responsive bg-white">
                <h3 class="">Expert Responses</h3><hr>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="" style="width:80%">Post Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($answers as $answer)
                        <tr>
                            <td>{{ $answer->body }}</td>
                            <td class="text-right" ><a href="{{ route('blog.post', ['id'=>$answer->post->id, 'title'=>formatUrlString($answer->post->title)]) }}" class="" ><i class="fa fa-eye text-light"></i></a></td>
                            <td class="text-right" ><a href="" class="text-danger" ><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{ $answers->links() }}
                </table>
            </div>
        </div>
    </section>
@endsection