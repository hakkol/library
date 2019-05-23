<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav js-navbar">
                        <li>
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('place')
</body>
</html>
