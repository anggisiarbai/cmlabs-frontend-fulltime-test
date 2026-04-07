<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ config('app.name', 'CMLabs') }} - @yield('title')
        </title>

        <link
            href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.css">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('head-additional')
    </head>
    <body>
        <div
            class="content left-anim">
            <div
                class="bre-container left-anim position-relative d-block mb-3">
                @yield('breadcrumb')
            </div>

            @yield('content')
        </div>

        <footer
            class="footer-container pt-3 pb-3 text-center d-block position-relative left-anim">
            &copy; {{ date('Y') }} {{ config('app.name', 'CMLabs') }}. Test project for CM Labs.
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-4.0.0.min.js"
            integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

        <script src="{{ asset('js/master.js') }}"></script>
        @yield('js-additional')
    </body>
</html>
