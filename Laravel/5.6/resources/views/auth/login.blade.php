@inject('config', 'config')
@inject('request', 'request')
@inject('translator','translator')
@inject('url','url')

@extends('layouts.auth', ['locale' => $config->get('app.locale')])

@section('title', $config->get('app.name') . ' - ' . $translator->trans('messages.signup.title'))

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
        <form method="POST" action="{{ $url->route('login') }}">
            @csrf

            <div>
                <label for="email">{{ $translator->trans('messages.login.email') }}</label>
                <div>
                    <input type="email" name="email" value="{{ $request->old('email') }}" required>
                </div>
            </div>

            <div>
                <label for="password">{{ $translator->trans('messages.login.password') }}</label>

                <div>
                    <input type="password" name="password" required>
                </div>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember" {{ $request->old('remember') ? 'checked' : '' }}>
                    {{ $translator->trans('messages.login.remember') }}
                </label>
            </div>

            <div>
                <button type="submit">{{ $translator->trans('messages.login.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
