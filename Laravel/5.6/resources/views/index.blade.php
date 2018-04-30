@extends('layouts.app')
@section('title', config('app.name'))
@section('header')
    @header(['username' => $username ]) @endheader
@endsection

@section('content')
    @foreach($entries as $entry)
        <p>{{ $entry->title }}</p>
    @endforeach
@endsection

@section('footer')
    @footer @endfooter
@endsection
