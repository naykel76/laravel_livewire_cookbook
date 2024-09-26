<x-gt-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2">
    <div class="container">
        <x-gt-menu menuname="pages" filename="nav-main" layout="fp-boxes" />
    </div>
    <hr class="mx-5">
    <section>
        <div class="container-md">
            <div class="bx light">
                <h2 id="drag-and-drop-sorting-basic">Drag and Drop Sorting - Basic</h2>
                <p>This example provides a user interface for managing a list of to-do items with drag-and-drop functionality. This allows users to reorder items dynamically. The component handles
                    sorting logic and updates the positions of items in the database accordingly.</p>
                <p><strong>Note</strong>: The drag functionality is fully coded and does not use the Gotime <code>Draggable</code> trait.</p>
                <h4>Prerequisites</h4>
                <ul>
                    <li>AlpineJS with Sort plugin</li>
                    <li>Livewire</li>
                    <li>Naykel/Gotime</li>
                </ul>
                <h4>Features</h4>
                <ul>
                    <li><strong>Drag and Drop Sorting</strong>: Reorder to-do items by dragging and dropping them.</li>
                    <li><strong>Real-time Updates</strong>: Order changes are instantly reflected and saved.</li>
                    <li><strong>Automatic Persistence</strong>: Saves the new order without a page refresh.</li>
                </ul>
                <livewire:drag-and-drop-sorting-basic />
            </div>
        </div>
    </section>
    <hr class="mx-5">
</x-gt-app-layout>
