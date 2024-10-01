<div class="bx">
    <div class="tar my">
        <x-gt-resource-action-button action="create" text="Add ToDo" />
    </div>
    <ul>
        @foreach ($items as $todo)
            <li wire:key="{{ $todo->id }}" class="bx pxy-075 flex items-center space-between">
                <span>
                    {{ $todo->name }} <br><small>Position: {{ $todo->position }}</small>
                </span>
                <x-gt-resource-action-button action="edit" :id="$todo->id" />
            </li>
        @endforeach
    </ul>
    <!-- Create/Edit Modal -->
    <x-gt-modal.base wire:model="showModal">
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
</div>


