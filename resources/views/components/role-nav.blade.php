@props([
    'roles' => [],
])

@if ($roles)
    <nav class="role-nav my-8">
        <ul class="flex flex-wrap">
            @foreach ($roles as $role)
                <li>
                    <a href="{{ get_term_link($role) }}" class="role-link">
                        {{ $role->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
