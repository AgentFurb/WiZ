<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WiZ</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('../css/login.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('../css/main.css') }}" />
    <link rel="shortcut icon" type="image/png" href="{{('../img/wizicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('../css/bootstrap.min.css') }}" />

</head>
<body>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
