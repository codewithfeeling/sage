@push('head')
    {{-- Facebook --}}
    <meta property="og:title" content="{!! $shareTitle !!}">
    <meta property="og:image" content="{{ $featured_image_url }}">
    <meta property="og:image:alt" content="{!! $shareTitle !!}">
    @if ($excerpt ?? false)
        <meta property="og:description" content="{!! $excerpt !!}">
    @endif
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ get_permalink() }}">
    <meta property="og:site_name" content="{{ get_bloginfo('name') }}">
    <meta property="og:locale" content="{{ get_locale() }}">

    {{-- X --}}
    <meta property="twitter:image" content="{{ $featured_image_url }}">
    <meta property="twitter:image:alt" content="{!! $shareTitle !!}">
    @if ($excerpt ?? false)
        <meta property="twitter:description" content="{!! $excerpt !!}">
    @endif
    <meta property="twitter:card" content="summary_large_image">
@endpush
