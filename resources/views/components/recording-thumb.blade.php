@props(['recording'])

<a class="recording-thumb" href="{{ get_permalink($recording) }}" data-id="{{ $recording->ID }}">
    <div class="image-container">
        <img src="{{ get_the_post_thumbnail_url($recording, 'thumbnail') }}"
            alt="Cover art for {{ $recording->post_title }}">
    </div>
    <div class="info">
        <h3>{{ $recording->post_title }}</h3>
        <p>{{ $recording->post_excerpt }}</p>
    </div>
</a>
