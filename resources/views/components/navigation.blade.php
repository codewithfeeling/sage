@props([
    'name' => null,
])

@php($menu = Navi::make()->withDefaultClasses()->build($name))

@if ($menu->isNotEmpty())
    <nav class="navigation">
        <ul {{ $attributes }}>
            @foreach ($menu->all() as $item)
                <x-nav-item :item="$item" class="menu-item" thickness="2" />
            @endforeach
        </ul>
    </nav>
@endif
