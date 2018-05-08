@inject('config', 'config')
@inject('url', 'url')

<div class="header">

    <div class="header-left">
        <a class="header_title" href="{{ $url->route('home') }}">{{ $config->get('app.name') }}</a>
    </div>

    <div class="header-center"></div>

    <div class="header-right"></div>

</div>
