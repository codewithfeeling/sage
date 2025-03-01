@php(the_content())

@include('partials.og-tags')

@if ($pagination)
  <nav class="page-nav" aria-label="Page">
    {!! $pagination !!}
  </nav>
@endif
