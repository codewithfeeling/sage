<article class="recording-view px-4 lg:px-8 lg:mt-8">
    <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 xl:gap-16">
        <div class="recording-image max-w-[720px]">
            {!! $image !!}
        </div>
        <div class="recording-content flex-1 flex flex-col items-start justify-center">
            <div class="w-full">
                <header class="mb-6">
                    <h1 class="font-bold">
                        {!! $title !!}
                    </h1>
                    <h2 class="italic">
                        {!! $artistNameDisplay !!}
                    </h2>
                </header>
                @php(the_content())
                <footer>
                    @if ($roles)
                        <x-role-nav :roles="$roles" />
                    @endif
                </footer>
            </div>
        </div>
    </div>
</article>

@include('partials.og-tags')

@if ($related ?? false)
    <div class="mt-16 px-4 lg:px-8 related">
        <h2 class="mb-6">More by {!! $artistNameDisplay !!}</h2>
        <x-recording-grid :recordings="$related" />
    </div>
@endif
