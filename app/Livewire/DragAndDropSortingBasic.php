<?php

namespace App\Livewire;

use App\Models\ToDo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DragAndDropSortingBasic extends Component
{
    public string $view = 'livewire.drag-and-drop-sorting-basic';

    /**
     * @param  int  $id  The ID of the model to be sorted (from Alpine $item).
     * @param  int  $position  The new position for the model (from the AlpineJS) $position.
     */
    public function sort($id, $position): void
    {
        $model = $this->query()->findOrFail($id);

        DB::transaction(function () use ($model, $position) {
            $current = $model->position;

            // No position change, do nothing and exit early...
            if ($current === $position) return;

            // Temporarily move the item out of the position stack...
            $model->update(['position' => -1]);

            // Grab the shifted block and shift it up or down...
            $block = $this->query()->whereBetween('position', [
                min($current, $position),
                max($current, $position),
            ]);

            // Determine the direction of the shift...
            $isDraggingDownwards = $current < $position;

            // Adjust the positions: decrement for moving down, increment for moving up
            $isDraggingDownwards
                ? $block->decrement('position')
                : $block->increment('position');

            // Reinsert the item back at its new position
            $model->update(['position' => $position]);
        });

        // Re-arrange the list in case there are any gaps...
        $this->arrange();
    }

    /**
     * Arrange the items in the list.
     */
    public function arrange(): void
    {
        DB::transaction(function () {
            // Reset the position to start from 0...
            $position = 0;

            // Loop through all the items in the query and update their position...
            foreach ($this->query()->get() as $model) {
                $model->position = $position++;
                $model->save();
            }
        });
    }

    protected function query()
    {
        return ToDo::query();
    }

    public function render()
    {
        // there is not need to use orderBy('position') here because it is
        // handled by the global scope in the ToDo model
        $query = ToDo::whereNull('user_id')->get();

        return view($this->view, [
            'items' => $query,
        ]);
    }
}
