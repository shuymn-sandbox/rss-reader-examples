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
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">{{ __('messages.login.email') }}</label>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div>
                <label for="password">{{ __('messages.login.password') }}</label>

                <div>
                    <input type="password" name="password" required>
                </div>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('messages.login.remember') }}
                </label>
            </div>

            <div>
                <button type="submit">{{ __('messages.login.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
