<div>
    <!-- Modal -->
    <x-gt-modal.dialog wire:model.live="showModal">
        <x-slot name="title">
            Edit Course
        </x-slot>
        <form wire:submit="save">
            <x-gt-input wire:model="form.title" label="title" />
            <x-gt-input wire:model="form.code" label="code" />
            <x-gt-input wire:model="form.price" label="price" />
        </form>
        <x-slot name="footer" class="tar">
            <x-gt-button wire:click="save" class="btn primary px-075" text="save" icon="disk" />
        </x-slot>
    </x-gt-modal.dialog>
    <!-- Table -->
    <div class="flex space-between">
        <x-gtl-search-input placeholder="Search by code or title..." class="maxw-sm" />
        <div>
            <x-gt-button wire:click="create" text="Create Modal" icon="plus-circle" class="xs primary" />
            <a href="{{ route("$routePrefix.create") }}" class="btn xs secondary">
                <x-gt-icon name="plus-circle" />
                <span class="ml-05">Create Route</span>
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('id')" sortable class="pr-3" :direction="$this->getSortDirection('id')"> ID </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('code')" sortable :direction="$this->getSortDirection('code')"> Code </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('title')" sortable :direction="$this->getSortDirection('title')"> Title </x-gt-table.th>
            </tr>
        </thead>
        <tbody wire:loading.class="opacity-05" class="divide-y">
            @forelse($items as $course)
                <tr>
                    <td>{{ str_pad($course->id, 5, 0, STR_PAD_LEFT) }}</td>
                    <td class="whitespace-nowrap pr-3">{{ $course->code }}</td>
                    <td class="whitespace-nowrap pr-3">{{ $course->title }}</td>
                    <td class="tar">
                        <x-gt-button wire:click="edit({{ $course->id }})" text="Edit Modal" icon="pencil-square" class="xs primary" />
                        <a href="{{ route("$routePrefix.edit", $course->id) }}" class="btn xs secondary">
                            <x-gt-icon name="plus-circle" />
                            <span class="ml-05">Edit Route</span>
                        </a>
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
