@inject('config', 'config')
@inject('translator','translator')

@extends('layouts.app', ['locale' => $config->get('app.locale')])

@section('title', $config->get('app.name') . ' - ' . $translator->trans('messages.feed.index.page-title'))

@section('header')
    @header(['name' => $name ]) @endheader
@endsection

@section('content')
    @foreach($feeds as $feed)
        <p>{{ $feed->title }}</p>
    @endforeach
@endsection

@section('footer')
    @footer @endfooter
@endsection
