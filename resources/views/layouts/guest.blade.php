<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-theme="light">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@include('layouts.partials.window-title')</title>

@include('layouts.partials.styles')

</head>
<body class="guest">

@include('layouts.partials.set-theme')
@include('layouts.partials.skip-navigation')
@include('layouts.partials.site-header')

<div class="container wrapper">
    <main class="main-contents" id="main-contents">
        <h1>{!! $title !!}</h1>

        @include('layouts.partials.flash-messages')
        @yield('contents')
    </main>
</div>

@include('layouts.partials.site-footer')
@include('layouts.partials.scripts')

</body>
</html>
