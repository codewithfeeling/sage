@props([
    'item' => null,
    'colour' => 'from-yellow to-yellow lg:from-black lg:to-black',
    'class' => 'menu-item',
    'thickness' => 2,
])

{{-- @php(dump($item)) --}}

<li
    class="menu-{{ sanitize_title($item->label) }} {{ $item->classes }} {{ $class }} {{ $item->active ? 'active' : '' }}">
    <a href="{{ $item->url }}">
        {{ $item->label }}
    </a>

    @if ($item->children)
        <ul class="submenu">
            @foreach ($item->children as $child)
                <x-nav-item :item="$child" class="submenu-item" thickness="2" colour="primary" />
            @endforeach
        </ul>
    @endif
</li>
