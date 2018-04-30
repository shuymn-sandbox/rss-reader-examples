@extends('layouts.app')

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
        <form method="post" action="{{ route('feed') }}">
            @csrf

            <div>
                <label for="url">{{ __('messages.feed.create.url') }}</label>
                <div>
                    <input type="url" name="url" required autofocus>
                </div>
            </div>

            <div>
                <label for="title">{{ __('messages.feed.create.title') }}</label>
                <div>
                    <input type="text" name="title" required>
                </div>
            </div>

            <div>
                <button type="submit">{{ __('messages.feed.create.post') }}</button>
            </div>
        </form>
    </div>
@endsection
