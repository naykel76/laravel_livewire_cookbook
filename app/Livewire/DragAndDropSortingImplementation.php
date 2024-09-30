<?php

namespace App\Livewire;

use App\Models\ToDo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;

class DragAndDropSortingImplementation extends Component
{
    use Renderable;

    protected string $modelClass = ToDo::class;
    public string $view = 'livewire.drag-and-drop-sorting-implementation';

    /**
     * Sort the model to a new position.
     *
     * @param  int  $id  The ID of the model to be sorted.
     * @param  int  $position  The NEW position for the model.
     */
    public function sort(int $id, int $position): void
    {
        $model = $this->modelClass::findOrFail($id);

        DB::transaction(function () use ($model, $position) {
            $current = $model->position;

            // No position change, do nothing and exit early...
            if ($current === $position) return;

            // Temporarily move the item out of the position stack...
            $model->update(['position' => -1]);

            // Grab the shifted block and shift it up or down...
            $block = $this->modelClass::whereBetween('position', [
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

    private function query()
    {
        // Note: there is not need to use orderBy('position') here because it is
        // handled by the global scope in the ToDo model
        return $this->modelClass::query()->whereNull('user_id');
    }

    protected function prepareData()
    {
        $query = $this->query();

        return ['items' => $query->get()];
    }
}
