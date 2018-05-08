@inject('config', 'config')
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
        <form method="POST" action="{{ $url->route('signup') }}">
            @csrf

            <div>
                <label for="username">{{ $translator->trans('messages.signup.username') }}</label>
                <div>
                    <input type="text" name="username" required autofocus>
                </div>
            </div>

            <div>
                <label for="nickname">{{ $translator->trans('messages.signup.nickname') }}</label>
                <div>
                    <input type="text" name="nickname" required>
                </div>
            </div>

            <div>
                <label for="email">{{ $translator->trans('messages.signup.email') }}</label>
                <div>
                    <input type="email" name="email" required>
                </div>
            </div>

            <div>
                <label for="password">{{ $translator->trans('messages.signup.password') }}</label>

                <div>
                    <input type="password" name="password" required>
                </div>
            </div>

            <div>
                <label for="password_confirmation">{{ $translator->trans('messages.signup.password-confirmation') }}</label>

                <div>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>

            <div>
                <button type="submit">{{ $translator->trans('messages.signup.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
