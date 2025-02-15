<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())>
    @php(wp_body_open())

    <div id="app" class="min-h-screen flex flex-col">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>

        @include('sections.header')

        @hasSection('sidebar')
            <div class="flex flex-col lg:flex-row gap-8 flex-1">
        @endif

        <main id="main" class="main flex-1">
            @yield('content')
        </main>

        @hasSection('sidebar')
            <aside class="sidebar px-4 lg:px-8">
                @yield('sidebar')
            </aside>
    </div>
    @endif

    @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
