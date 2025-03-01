<header
    class="header absolute top-0 left-0 w-full h-16 lowercase z-50 bg-white">
    {{-- Main header content --}}
    <div class="flex items-center justify-between pl-4 pr-2 md:pr-4 lg:px-8 h-full">
        <a class="logo italic xl:text-2xl" href="{{ home_url('/') }}">
            {!! $siteName !!}
        </a>

        @if (has_nav_menu('primary_navigation'))
            <button id="nav-toggle" class="relative z-50" aria-label="Toggle navigation">
                <div class="bar-group top">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="bar-group bottom">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </button>
            <x-navigation name="primary_navigation" class="nav" />
        @endif

    </div>
</header>
