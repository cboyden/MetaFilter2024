@extends('layouts.guest')

@section('title', $title ?? 'Untitled')

@section('contents')
    profile show

    @include('profile.partials.contributions')
@endsection
