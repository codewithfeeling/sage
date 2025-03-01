@props([
    'icon' => 'arrow-down',
    'class' => 'text-white',
])

<div class="scroll-down-container absolute bottom-0 left-0 w-full h-16 z-50 flex justify-center">
    <button {{ $attributes->merge(['class' => 'scroll-down ' . $class]) }}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-16 h-16">
            <rect width="256" height="256" fill="none" />
            <polyline points="208 96 128 176 48 96" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="12" />
        </svg>
    </button>
</div>
