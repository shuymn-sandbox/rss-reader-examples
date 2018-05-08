@inject('config', 'config')

@extends('layouts.app', ['locale' => $config->get('app.locale')])

@section('title', $config->get('app.name'))

@section('header')
    @header(['name' => $name ]) @endheader
@endsection

@section('content')
    @foreach($entries as $entry)
        <p>{{ $entry->title }}</p>
    @endforeach
@endsection

@section('footer')
    @footer @endfooter
@endsection
