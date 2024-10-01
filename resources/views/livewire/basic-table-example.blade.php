<div class="bx">
    <div class="tar my">
        <x-gt-resource-action-button action="create" text="Add ToDo" />
    </div>
    <table>
        <tbody wire:loading.class="opacity-05" class="divide-y">
            @forelse($items as $todo)
                <tr>
                    <td>{{ str_pad($todo->id, 5, 0, STR_PAD_LEFT) }}</td>
                    <td>{{ $todo->name }}</td>
                    <td>{{ $todo->position }}</td>
                    <td class="tar">
                        <x-gt-resource-action-button action="edit" :id="$todo->id" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy txt-lg" colspan="6">No records found...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
