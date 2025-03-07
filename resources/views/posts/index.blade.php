@extends('layouts.app')

@section('title', $title ?? 'Untitled')

@section('contents')
    @if ($subdomain ==='fanfare')
        <x-snippets.snippet-component slug="fanfare-spoilers-note" small-text=true />
    @endif

    @if ($subdomain ==='jobs')
        <x-snippets.snippet-component slug="jobs-location-note" small-text=true />
    @endif

    @if ($subdomain ==='metafilter')
        @auth
            <x-members.happy-birthday-component />
        @endauth
    @endif

    @if (isset($showTitle) && $showTitle === true)
        <h1>{{ $title }}</h1>
    @endif

    @auth
        <x-buttons.new-post-button />
    @endauth

    @guest
        @include('posts.partials.show-not-logged-in', [
            'context' => 'index'
        ])
    @endguest

    <livewire:posts.post-index-component />
@endsection
