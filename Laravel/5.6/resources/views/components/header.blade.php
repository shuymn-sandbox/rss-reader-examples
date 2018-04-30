<div class="header">

    <div class="header-left">
        <a class="header_title" href="{{ route('home') }}">{{ config('app.name') }}</a>
    </div>

    <div class="header-center"></div>

    <div class="header-right">
        @auth
            {{ $username }}
            <a href="{{ route('feed.create') }}">{{ __('messages.header.add') }}</a>
            <a class="header-logout" href="{{ route('logout') }}">{{ __('messages.header.logout') }}</a>
        @endauth
        @guest
            <a class="header-register" href="{{ route('signup') }}">{{ __('messages.header.register') }}</a>
            <a class="header-login" href="{{ route('login') }}">{{ __('messages.header.login') }}</a>
        @endguest
    </div>

</div>
