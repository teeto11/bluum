<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Home | Bluumhealth</title>
    <meta name="description" content="Home Page Description" />
    <meta name="author" content="Farawe iLyas" />
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i" />
    <!-- ICON -->
    <link rel="stylesheet" href="{{ asset('fonts/mainfont/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>
<body>

    @yield('content')

	<!-- JavaScript -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/velocity.min.js') }}"></script>
	<script src="{{ asset('js/app-ui.js') }}"></script>
</body>
</html>
