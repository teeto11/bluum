<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title }} | Bluumhealth</title>
    <meta name="description" content="Home Page Description" />
    <meta name="author" content="Farawe iLyas" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i" />
    <!-- ICON -->
    <link rel="stylesheet" href="{{ asset('fonts/mainfont/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <style>
        .verified-icon {
            font-size: 2rem;
            margin-left: 0.5rem;
            padding-top: 0.6vh;
            color: #3c763d;
        }
    </style>
    @yield('header_scripts')
</head>
<body>

    @yield('content')

    <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <i class="fa fa-exclamation-circle" ></i> Please Confirm
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirm" >Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/velocity.min.js') }}"></script>
	<script src="{{ asset('js/app-ui.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/default.js') }}" ></script>
    <script>
        $('#search-btn').click(function () {
            $('#search-form').submit();
        });

        $('.action-form').submit(function (e) {

            if(!$(this).hasClass('confirmed')){
                e.preventDefault();
                let formId = '#'+$(this).attr('id');

                $('#confirmation #confirm').attr('data-id', formId);
                $('#confirmation').modal('show');

                return false;
            }else return true;
        });

        $('#confirmation #confirm').click(function (e) {
            e.preventDefault();
            let formId = $(this).attr('data-id');

            $(formId).addClass('confirmed');
            $(formId).submit();
        });
    </script>
    @yield('scripts')
</body>
</html>
