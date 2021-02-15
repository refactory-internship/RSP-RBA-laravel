<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }}</title>
    @include('layouts.partials.head')
</head>
<body>
<div id="app">
    @include('layouts.partials.nav')

    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('layouts.partials.script')
</body>
</html>
