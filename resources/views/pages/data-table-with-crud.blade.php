<x-gt-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2 space-y">
    <section>
        <div class="container-lg bx light">
            <h2>Data Table with Create and Edit</h2>
            <p>This example integrates a Naykel data table for displaying data and a form object with a CreateEdit component. The table is a Livewire component that uses the <code>Course</code>
                model to display data. The forms for creating and editing are also Livewire components, utilising the <code>CourseForm</code> and <code>CourseCreateEdit</code> components.</p>
            <h4>Prerequisites</h4>
            <p>The Livewire components require <code>naykel/gotime</code> traits</p>
            <h4>Features</h4>
            <ul>
                <li>A full-page Livewire data table component with pagination, sorting, and search functionality.</li>
                <li>Full-page CreateEdit component accessible through defined routes.</li>
                <li>Option to access the CreateEdit component via a modal.</li>
            </ul>
            <div class="bx">
                <livewire:course.course-table />
            </div>
        </div>
    </section>
</x-gt-app-layout>