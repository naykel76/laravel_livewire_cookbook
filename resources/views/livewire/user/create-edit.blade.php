<div class="container-sm py-3">
    <form wire:submit="save">
        <div class="grid lg:cols-2">
            <x-gt-input wire:model="form.name" label="name" />
            <x-gt-input wire:model="form.email" label="email" />
        </div>
        <div class="grid lg:cols-2">
            <x-gt-input wire:model="form.phone" label="phone" />
        </div>
        <x-gt-button wire:click="save" class="btn primary px-075" text="save" icon="disk" />
    </form>
</div>
