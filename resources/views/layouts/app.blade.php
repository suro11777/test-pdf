<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @include('partials.includes.css')
    @include('partials.includes.top_js')
</head>
<body>
<div class="page d-flex flex-column">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</div>
@include('partials.includes.bottom_js')
</body>
</html>
