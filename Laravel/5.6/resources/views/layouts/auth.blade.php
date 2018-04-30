<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  @section('style')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> @show
  <title>@yield('title')</title>
</head>

<body>
<div class="container">
  <div class="container-header">
    @yield('header')
  </div>
  <div class="container-content">
    <div class="content-center content-center_auth">
      @yield('content')
    </div>
  </div>
  <div class="container-footer">
    @yield('footer')
  </div>
</div>
</body>

</html>
