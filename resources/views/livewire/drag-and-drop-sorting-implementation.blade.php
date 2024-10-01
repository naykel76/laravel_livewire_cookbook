<div>
    <x-gt-errors />
    <div class="tar mb-05">
        <x-gt-resource-action-button action="create" text="Add ToDo" />
    </div>
    <!-- Draggable item list -->
    <ul x-sort="$wire.sort($item, $position)">
        @foreach ($items as $todo)
            <li wire:key="{{ $todo->id }}" x-sort:item="{{ $todo->id }}"
                class="bx pxy-075 flex items-center space-between hover:bg-gray-100 cursor-move">
                <span>
                    {{ $todo->name }} <br><small>Position: {{ $todo->position }}</small>
                </span>
                <span class="flex">
                    <x-gt-resource-action-button action="edit" :id="$todo->id" />
                    <x-gt-resource-action-button action="delete" :id="$todo->id" />
                </span>
            </li>
        @endforeach
    </ul>
    <!-- Create/Edit modal -->
    <x-gt-modal.base wire:model="showModal">
        <x-gt-errors />
        <form wire:submit="save">
            <div class="flex gap">
                <x-gt-input wire:model="form.name" label="name" rowClass="fg1" />
                <x-gt-input wire:model="form.position" label="position" class="w-6" disabled />
            </div>
            <div class="tar">
                <x-gt-button wire:click="cancel" class="btn sm px-075" text="CANCEL" icon="cross" />
                <x-gt-button wire:click="save" class="btn primary sm px-075" text="SAVE" icon="disk" />
            </div>
        </form>
    </x-gt-modal.base>
    <!-- Delete confirmation modal -->
    <x-gt-modal.delete wire:model="selectedItemId" :$selectedItemId />
</div>

@pushOnce('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
@endPushOnce
