<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FunFaceAdmin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

    <!-- FAV -->
    <!-- <link rel="icon" href="/img/brand/sj_logo.png" sizes="32x32"/>
    <link rel="icon" href="/img/brand/sj_logo.png" sizes="192x192"/> -->
    <!-- <link rel="apple-touch-icon-precomposed" href="/img/brand/sj_logo.png"/> -->
</head>
<body>
<div id="app">
    <div class="jumbotron jumbotron-fluid mb-0 chandler"></div>
    <div class="container-fluid login-container translate-up">
        @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>
