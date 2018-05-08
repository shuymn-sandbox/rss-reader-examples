@inject('config', 'config')
@inject('translator','translator')
@inject('url','url')

@extends('layouts.auth', ['locale' => $config->get('app.locale')])

@section('title', $config->get('app.name') . ' - ' . $translator->trans('messages.feed.create.page-title'))

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form method="post" action="{{ $url->route('post.feed') }}">
            @csrf

            <div>
                <label for="url">{{ $translator->trans('messages.feed.create.url') }}</label>
                <div>
                    <input type="url" name="url" required autofocus>
                </div>
            </div>

            <div>
                <button type="submit">{{ $translator->trans('messages.feed.create.post') }}</button>
            </div>
        </form>
    </div>
@endsection
