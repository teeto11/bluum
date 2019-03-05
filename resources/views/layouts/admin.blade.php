<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Bluumhealth</title>
    <meta name="description" content="Home Page Description" />
    <meta name="author" content="Farawe iLyas" />
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}" />
    @yield('header-scripts')
</head>
<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0"><img src="{{ asset('images/bloom.png') }}" height="50" width="50" alt=""><span class="px-2">Bluumhealth</span></h4>
        </div>

        <ul class="list-unstyled contents">
            <li class="active">
                <a href="/admin">Dashboard <i class="fa fa-dashboard float-right"></i></a>
            </li>
            <li class="">
                <a href="#expertsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Experts</a>
                <ul class="collapse list-unstyled" id="expertsSubmenu">
                    <li>
                        <a href="{{ route('admin.expert.new') }}">Add Expert <i class="fa fa-user-plus float-right"></i></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.expert') }}">View Experts <i class="fa fa-eye float-right"></i></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.expert.disabled') }}">View Disabled Experts <i class="fa fa-eye float-right"></i></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Users <i class="fa fa-users float-right"></i></a>
            </li>
            <li>
                <a href="/admin/questions">Questions <i class="fa fa-question-circle float-right"></i></a>
            </li>
            <li>
                <a href="/admin/posts">Posts <i class="fa fa-sticky-note-o float-right"></i></a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="" style="">
                    <i class="fa fa-bars"></i>
                    <span>Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown " style="width:180px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/fyuma.jpg" class="mx-2" height="30" width="30" alt="" style="border-radius:100%;"> Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Change Password</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/html2canvas.min.js') }}" ></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
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
    });
</script>
@yield('scripts')
</body>
</html>