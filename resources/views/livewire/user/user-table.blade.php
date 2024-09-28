<div class="container-md">

    <div class="flex space-between">
        <x-gtl-search-input placeholder="Search by name or email..." class="maxw-sm" rowClass="fg1" />
        <x-gt-button wire:click="create" text="Add User" icon="plus-circle" class="primary" />
    </div>

    <x-gt-modal.dialog wire:model.live="showModal">
        <x-slot name="title">
            Edit/Create User
        </x-slot>
        <form wire:submit="save">
            <div class="grid lg:cols-2">
                <x-gt-input wire:model="form.name" label="name" />
                <x-gt-input wire:model="form.email" label="email" />
            </div>
            <div class="grid lg:cols-2">
                <x-gt-input wire:model="form.phone" label="phone" />
            </div>
            <x-slot name="footer" class="tar">
                <x-gt-button wire:click="save" class="btn primary sm px-075" text="SAVE" icon="disk" />
            </x-slot>
        </form>
    </x-gt-modal.dialog>

    <table>
        <thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('id')" sortable class="pr-3 w-3" :direction="$this->getSortDirection('id')"> ID </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('firstname')" sortable :direction="$this->getSortDirection('firstname')"> Name </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('email')" sortable :direction="$this->getSortDirection('email')"> Email </x-gt-table.th>
                <x-gt-table.th class="tac w-200"></x-gt-table.th>
            </tr>
        </thead>
        <tbody wire:loading.class="opacity-05" class="divide-y">
            @forelse($items as $user)
                <tr>
                    <td>{{ str_pad($user->id, 5, 0, STR_PAD_LEFT) }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td class="tar">
                        <x-gt-action-button action="edit" :id="$user->id" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy txt-lg" colspan="6">No records found...</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $items->links('gotime::pagination.livewire') }}

</div>
