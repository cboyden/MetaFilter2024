<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" x-data="themeSwitcher()" :class="theme">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@include('layouts.partials.window-title') - {{ $subsiteName }}</title>

@include('layouts.partials.styles')

</head>
<body class="minimal">

<header class="site-header">
    <div class="container">
        @include('layouts.partials.site-title')
    </div>
</header>

<main class="main-contents" id="main-contents">
    @include('layouts.partials.flash-messages')

    <h1>{!! $title ?? 'Untitled' !!}</h1>

    @yield('contents')

    @if (isset($showMemberNav) && $showMemberNav === true)
        @include('layouts.navigation.member-navigation')
    @endif
</main>

<footer class="site-footer" id="site-footer">
    @include('layouts.partials.fine-print')
</footer>

@include('layouts.partials.scripts')

</body>
</html>
