@extends('layouts.auth')
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
        <form method="POST" action="{{ route('signup') }}">
            @csrf

            <div>
                <label for="username">{{ __('messages.signup.username') }}</label>
                <div>
                    <input type="text" name="username" required autofocus>
                </div>
            </div>

            <div>
                <label for="nickname">{{ __('messages.signup.nickname') }}</label>
                <div>
                    <input type="text" name="nickname" required>
                </div>
            </div>

            <div>
                <label for="email">{{ __('messages.signup.email') }}</label>
                <div>
                    <input type="email" name="email" required>
                </div>
            </div>

            <div>
                <label for="password">{{ __('messages.signup.password') }}</label>

                <div>
                    <input type="password" name="password" required>
                </div>
            </div>

            <div>
                <label for="password_confirmation">{{ __('messages.signup.password-confirmation') }}</label>

                <div>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>

            <div>
                <button type="submit">{{ __('messages.signup.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
