@props(['recordings' => []])

<div class="recordings-grid">
    @foreach ($recordings as $recording)
        <x-recording-thumb :recording="$recording" />
    @endforeach
</div>
