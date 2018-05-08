@inject('config', 'config')
@inject('url', 'url')
@inject('translator','translator')

<div class="header">

    <div class="header-left">
        <a class="header_title" href="{{ $url->route('home') }}">{{ $config->get('app.name') }}</a>
    </div>

    <div class="header-center"></div>

    <div class="header-right">
        @auth
            {{ $name ?? '' }}
            <a href="{{ $url->route('feed.create') }}">
                {{ $translator->trans('messages.header.add') }}
            </a>
            <a class="header-logout" href="{{ $url->route('logout') }}">
                {{ $translator->trans('messages.header.logout') }}
            </a>
        @endauth
        @guest
            <a class="header-register" href="{{ $url->route('signup') }}">
                {{ $translator->trans('messages.header.register') }}
            </a>
            <a class="header-login" href="{{ $url->route('login') }}">
                {{ $translator->trans('messages.header.login') }}
            </a>
        @endguest
    </div>

</div>
