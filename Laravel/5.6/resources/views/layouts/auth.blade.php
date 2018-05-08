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
        @component('components.simple-header') @endcomponent
    </div>
    <div class="container-content">
        <div class="content-center content-center_auth">
            @yield('content')
        </div>
    </div>
    <div class="container-footer">
        @footer @endfooter
    </div>
</div>
</body>

</html>
