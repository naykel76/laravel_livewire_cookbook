<div x-sort="$wire.sort($item, $position)" class="space-y-05">
    @foreach ($items as $todo)
        <div wire:key="{{ $todo->id }}" x-sort:item="{{ $todo->id }}" class="bx flex va-c hover:bg-gray-100 cursor-move">
            <div class="flex space-between w-full ">
                <div>{{ $todo->name }}</div>
                <div>Position: {{ $todo->position }}</div>
            </div>
        </div>
    @endforeach
</div>

@pushOnce('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
@endPushOnce