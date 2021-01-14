<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    </head>
    <body>
    	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

        @yield('content')
    </body>
</html>
