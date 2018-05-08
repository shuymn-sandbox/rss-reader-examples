<!DOCTYPE html>

<html lang="{{ $locale }}">

<head>
    <meta charset="utf-8">
    @section('style')
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @show
    <title>@yield('title')</title>
</head>

<body>
<div class="container">
    <div class="container-header">
        @yield('header')
    </div>
    <div class="container-content">
        <div class="content-left">
            @yield('side-left')
        </div>
        <div class="content-center">
            @yield('content')
        </div>
        <div class="content-right">
            @yield('side-right')
        </div>
    </div>
    <div class="container-footer">
        @yield('footer')
    </div>
</div>
</body>

</html>
