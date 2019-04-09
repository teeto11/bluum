@extends('layouts.admin')

@section('header-scripts')
    <style>
        #p-image-cover {
            height: 35vh;
        }
        #p-image-cover input {
            display: none;
        }
        #p-image-cover #p-image{
            border: 1px solid #fafafa;
            height: 100%;
            overflow: hidden;
            -webkit-transition: all 0.1s;
            -moz-transition: all 0.1s;
            -ms-transition: all 0.1s;
            -o-transition: all 0.1s;
            transition: all 0.1s;
        }
        #p-image-cover #p-image:hover {
            cursor: pointer;
        }
        #p-image:hover{
            cursor:pointer;
            background: rgba(0,0,0,.5);
            transition: all 0.5s;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper px-4">
        <div class="add-expert-wrapper">
            <h4><i class="fa fa-gears"></i> Add Expert</h4><hr>
            @if(session()->has('error'))
                {!! '<div class="alert alert-danger" >'.session("error").'</div>' !!}
            @elseif(session()->has('success'))
                {!! '<div class="alert alert-success" >'.session("success").'</div>' !!}
            @endif
            <form action="{{ route('admin.expert.store') }}" method="post" >
                @csrf
                <div class="row mb-5" >
                    <div class="col-md-3" >
                        <div id="p-image-cover" >
                            <div id="p-image" >
                                <img src="{{ asset('storage/post_cover_image/noimage.png') }}" height="100%" >
                            </div>
                            <input type="file" id="profile_image" >
                            <button type="button" class="btn btn-danger btn-sm" id="reset-img-crop" >Reset</button>
                        </div>
                        @if ($errors->has('profile_image_base64'))
                            <div class="invalid-feedback text-danger d-block" role="alert">
                                <p><strong>{{ $errors->first('profile_image_base64') }}</strong></p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9" >
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="email">Email</label>
                                <input type="Email" class="form-control" name="email" id="email" placeholder="E.g expert@gmail.com" value="{{ old('email') }}" >
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback text-danger d-block" role="alert">
                                        <p><strong>{{ $errors->first('email') }}</strong></p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Telephone</label>
                                <input type="tel" class="form-control" name="tel" id="" value="{{ old('tel') }}" >
                                @if ($errors->has('tel'))
                                    <div class="invalid-feedback text-danger d-block" role="alert">
                                        <p><strong>{{ $errors->first('tel') }}</strong></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Expertise</label>
                                <input type="text" class="form-control" name="expertise" id="" placeholder="e.g Medical doctor" value="{{ old('expertise') }}" >
                                @if ($errors->has('expertise'))
                                    <div class="invalid-feedback text-danger d-block" role="alert">
                                        <p><strong>{{ $errors->first('expertise') }}</strong></p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Experience</label>
                                <input type="number" min="0" class="form-control" name="experience" id="" value="{{ old('experience') }}" >
                                @if ($errors->has('experience'))
                                    <div class="invalid-feedback text-danger d-block" role="alert">
                                        <p><strong>{{ $errors->first('experience') }}</strong></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">About Expert</label>
                    <textarea name="about" class="form-control" id="" rows="10">{{ old('about') }}</textarea>
                    @if ($errors->has('about'))
                        <div class="invalid-feedback text-danger d-block" role="alert">
                            <p><strong>{{ $errors->first('about') }}</strong></p>
                        </div>
                    @endif
                </div>
                <div class="w-100 btn-container">
                    <input type="submit" class="post-btn btn" name="" id="" value="Create">
                    <input type="reset" class="delete-btn btn" name="" id="" value="Delete">
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script>

        let pImageCover = $('#p-image-cover');
        pImageCover.height(pImageCover.width());

        setInterval(function () {
            pImageCover.height(pImageCover.width());
        }, 100);

        //convert canvas to base64
        function convertCanvasToImage(canvas) {

            let image = new Image();
            image.src = canvas.toDataURL("image/png");

            return image;
        }

        //make image draggable
        function makeDragabble(axis){
            $("#p-image img" ).draggable({
                scroll: false,
                axis: axis,
            });
        }

        function resetDragabble(){

            let img = $("#p-image img" );
            img.css('top', '');
            img.css('left', '');
        }

        function destroyDragabble(){

            resetDragabble();
            if($( "#p-image img" ).hasClass('ui-draggable')){
                $( "#p-image img" ).draggable( "destroy" );
            }
        }

        //open form file input
        $("#p-image").click(function () {
            $("#profile_image").click();
        });

        //Preview profile image
        $("#profile_image").change(function () {

            let input = this;
            let img = $("#p-image img");

            if(input.files && input.files[0]) {
                destroyDragabble();
                let reader = new FileReader();

                reader.onload = function (e) {
                    $("#p-image img").attr('src', e.target.result);
                    let i = new Image();
                    let imgHeight = null;
                    let imgWidth = null;

                    i.onload = function(){
                        imgHeight = i.height;
                        imgWidth = i.width;

                        console.log();
                        if(imgHeight >= imgWidth){
                            img.attr('width', '100%');
                            img.attr('height', 'auto');
                            makeDragabble('y');
                        }else{
                            img.attr('height', '100%');
                            img.attr('width', 'auto');
                            makeDragabble('x');
                        }
                    };

                    i.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        });

        $("#reset-img-crop").click(function () {
            resetDragabble();
        });

        //append base64 profile image on submit
        $("form").submit(function (e) {
            let that = this;
            e.preventDefault();

            html2canvas(document.querySelector("#p-image")).then(canvas => {

                $(that).append(`<input type="hidden" name="profile_image_base64" value="${convertCanvasToImage(canvas).src}" id="profile-image-base64" >`);
                that.submit();
            });

        });
    </script>
@endsection