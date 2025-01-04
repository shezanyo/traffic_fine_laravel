<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    @yield('head')
</head>
<body>
<!-- Header -->
@include('layouts.header')
<!-- Main Content -->
<main>
    @yield('content')
</main>
<!-- Footer -->
@include('layouts.footer')

<script src="{{ asset('js/bootstrap.bindle.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
@yield('scripts')
</body>
</html>
