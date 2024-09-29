<x-gt-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2 space-y">
    <section>
        <div class="container-lg bx light">
            <h2>User Data Table with CreateEdit Component (Modal and Route)</h2>
            <h4>Features</h4>
            <ul>
                <li><code>UserTable</code> - A Livewire component that displays data in a table with pagination, sorting, and search functionality.</li>
                <li><code>UserForm</code> - A Livewire form object that encapsulates form logic independently from the Livewire component.</li>
                <li><code>UserCreateEdit</code> - A Livewire component that displays a full-page form for creating and editing data accessed via route.</li>
                <li>Modal to create and edit data directly from the table.</li>
            </ul>
            <div class="bx">
                <livewire:user.user-table />
            </div>
        </div>
    </section>
</x-gt-app-layout>
