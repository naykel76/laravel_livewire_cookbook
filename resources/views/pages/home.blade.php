<x-gt-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2">
    <section>
        <div class="container-xxl bx light">
            <p>The example has a hard coded query that returns all to-do's for the first user. This will be fixed later.</p>
            <livewire:user.to-do-list />
        </div>
    </section>
    <hr class="mx-5">
    <div class="container">
        <x-gt-menu menuname="pages" filename="nav-main" layout="fp-boxes" />
    </div>
    <hr class="mx-5">
    <section>
        <div class="container-xxl bx light">
            <h2 id="drag-and-drop-sorting-basic">Drag and Drop Sorting Implementation</h2>
            <div class="flex gap-2 va-t">
                <div>
                    <p>This example demonstrates the implementation of a sortable list using drag-and-drop functionality. The focus on the list itself, without considering any relationships
                        or additional data.</p>
                    <p>This example provides a user interface for managing a list of to-do items with drag-and-drop functionality. This allows users to reorder items dynamically. The component
                        handles
                        sorting logic and updates the positions of items in the database accordingly.</p>
                    <p><strong>Note</strong>: The <code>sort</code> method in this example is fully coded and does not use the Gotime <code>Draggable</code> trait.</p>
                    <p class="txt-red"><strong>To Do</strong> Need to handle re-order after deleting an item</p>
                    <h4>Prerequisites</h4>
                    <ul>
                        <li>AlpineJS with Sort plugin</li>
                        <li>Livewire</li>
                        <li>Naykel/Gotime</li>
                    </ul>
                    <h4>Related Files</h4>
                    <ul>
                        <li><code>DragAndDropSortingImplementation.php</code></li>
                        <li><code>drag-and-drop-sorting-implementation.blade.php</code></li>
                    </ul>
                    <h4>Features</h4>
                    <ul>
                        <li><strong>Drag and Drop Sorting</strong>: Reorder to-do items by dragging and dropping them.</li>
                        <li><strong>Real-time Updates</strong>: Order changes are instantly reflected and saved.</li>
                        <li><strong>Automatic Persistence</strong>: Saves the new order without a page refresh.</li>
                        <li><strong>Add and Edit Items</strong>: Add and edit items directly within the list via modal.</li>
                        <li><strong>Delete Items</strong>: Delete items from the list and reorder them as needed.</li>
                    </ul>
                </div>
                <div class="bx fs0 w-24">
                    <livewire:drag-and-drop-sorting-implementation />
                </div>
            </div>
        </div>
    </section>
    <hr class="mx-5">
    <section>
        <div class="container bx light">
            <h2 id="table-and-list-components">Basic Table and List Components</h2>
            <p>Simple side-by-side compassion of a list and table component.</p>
            <div class="grid cols-2">
                <div><livewire:basic-table-example /></div>
                <div><livewire:basic-list-example /></div>
            </div>
        </div>
    </section>
    <hr class="mx-5">
</x-gt-app-layout>
