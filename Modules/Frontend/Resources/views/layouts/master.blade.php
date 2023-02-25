<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config('backpack.base.html_direction') }}">
    <head>
        @include('frontend::inc.head')
        <link href="{{ asset('packages/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
{{--        <link rel="stylesheet" href="{{ asset('packages/backpack/base/css/theme.css') }}">--}}
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        @yield('head')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-D8WF9F6LVC"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-D8WF9F6LVC');
        </script>
    </head>
<body class="app">

    @include('frontend::partials.nav')

    <div class="w-100 overflow-hidden">
        @yield('content')
    </div>

    <footer class="app-footer p-0 bg-gray-dark">
        @include('frontend::inc.footer')
    </footer>

    @yield('before_scripts')
    @stack('before_scripts')

    @include(backpack_view('inc.scripts'))

    @yield('after_scripts')
    @stack('after_scripts')

    <script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
    @if (app()->getLocale() !== 'en')
        <script src="{{ asset('packages/select2/dist/js/i18n/' . str_replace('_', '-', app()->getLocale()) . '.js') }}"></script>
    @endif

    <script>
        $(document).ready(function() {
            $('.select2').select2({theme: "bootstrap"});
        });
    </script>
</body>
</html>
