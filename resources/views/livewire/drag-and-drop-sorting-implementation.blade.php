<div>
    <!-- Draggable list -->
    <ul x-sort="$wire.sort($item, $position)">
        @foreach ($items as $todo)
            <li wire:key="{{ $todo->id }}" x-sort:item="{{ $todo->id }}" 
                class="bx pxy-075 flex items-center space-between hover:bg-gray-100 cursor-move">
                <span>
                    {{ $todo->name }} <br><small>Position: {{ $todo->position }}</small>
                </span>
            </li>
        @endforeach
    </ul>
</div>

@pushOnce('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
@endPushOnce




{{-- <div>
    <div class="tar">
        <x-gt-resource-action-button action="create" text="Add ToDo" />
    </div>
    <ul class="mx-0 mt-1">
        @foreach ($items as $todo)
            <li class="bx pxy-075 flex items-center space-between">
                <span>
                    {{ $todo->name }} <br><small>Position: {{ $todo->position }}</small>
                </span>
                <x-gt-resource-action-button action="edit" :id="$todo->id" />
            </li>
        @endforeach
    </ul>
    <!-- Modal -->
    <x-gt-modal.base wire:model="showModal">
        <form wire:submit="save">
            <div class="flex gap">
                <x-gt-input wire:model="form.name" label="name" rowClass="fg1" />
                <x-gt-input wire:model="form.position" label="position" class="w-6" disabled />
            </div>
            <div class="tar">
                <x-gt-button wire:click="save" class="btn primary sm px-075" text="SAVE" icon="disk" />
            </div>
        </form>
    </x-gt-modal.base>
</div> --}}

{{-- --}}
