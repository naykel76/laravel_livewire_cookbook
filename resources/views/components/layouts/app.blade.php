<x-gt-app-layout layout="base" :$pageTitle>

    @if (class_exists(\Naykel\Devit\DevitServiceProvider::class))
        @includeIf('devit::components.dev-toolbar')
    @else
        @if (config('authit.allow_register') && Route::has('login'))
            @includeFirst(['components.layouts.partials.top-toolbar', 'gotime::components.layouts.partials.top-toolbar'])
        @endif
    @endif

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    <main {{ $attributes->merge(['class' => 'nk-main py-5-3-2']) }}>
        <div class="container">
            @if ($hasTitle)
                <h1>{{ $pageTitle }}</h1>
            @endif
            {{ $slot }}
        </div>
    </main>

    @includeFirst(['components.layouts.partials.footer', 'gotime::components.layouts.partials.footer'])

</x-gt-app-layout>
