<div class="container-sm py-3">
    <form wire:submit="save">
        <x-gt-input wire:model="form.title" label="title" />
        <x-gt-input wire:model="form.code" label="code" />
        <x-gt-input wire:model="form.price" label="price" />
        <x-gt-button wire:click="save" class="btn primary px-075" text="save" icon="disk" />
    </form>
</div>
