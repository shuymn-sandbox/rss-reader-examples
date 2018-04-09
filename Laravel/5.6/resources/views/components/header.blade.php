<div class="header">

  <div class="header-left">
    <a class="header_title" href="{{ route('home') }}">{{ config('app.name') }}</a>
  </div>

  <div class="header-center"></div>

  <div class="header-right">
    @auth
    <p>auth</p>
    @endauth @guest
    <a class="header-register" href="{{ route('register') }}">{{ __('Register') }}</a>
    <a class="header-login" href="{{ route('login') }}">{{ __('Login') }}</a> @endguest
  </div>

</div>
