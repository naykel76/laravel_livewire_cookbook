<x-gt-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2-2">

    <h1>{{ $pageTitle ?? null }}</h1>

    <div class="grid cols-2">
        <div class="bx">
            <div class="bx-title">Data Table with CRUD</div>
            <p>Data table example with pagination, sorting, search, and CRUD functions, accessible via modal on the same page and through routes.</p>
            <a href="{{ url('data-table-with-crud') }}" class="btn primary">View Example</a>
        </div>
    </div>

</x-gt-app-layout>
