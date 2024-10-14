<x-gt-app-layout layout="base" :$pageTitle>

    @if (class_exists(\Naykel\Devit\DevitServiceProvider::class))
        @includeIf('devit::components.dev-toolbar')
    @else
        @if (config('authit.allow_register') && Route::has('login'))
            @includeFirst(['components.layouts.partials.top-toolbar', 'gotime::components.layouts.partials.top-toolbar'])
        @endif
    @endif

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    <main {{ $attributes->merge(['class' => 'nk-main']) }}>
        {{-- don't add a container here, it is more hassle than it is worth! --}}
        @if ($hasTitle)
            <h1>{{ $pageTitle }}</h1>
        @endif
        {{ $slot }}
    </main>

    @includeFirst(['components.layouts.partials.footer', 'gotime::components.layouts.partials.footer'])

</x-gt-app-layout>
