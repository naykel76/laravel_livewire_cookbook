<?php

namespace App\Livewire\Traits;

use Closure;
use Illuminate\Support\Facades\DB;

/**
 * This trait is more flexible than the previous commit. It allows you to pass
 * in a callback function to change the query conditions for the sortableFilter
 * scope when calling the move method in the component or controller.
 *
 * Refer to previous commit for the simple implementation without the callback.
 * https://github.com/naykel76/laravel_livewire_cookbook/commit/076cdf0ec9382912eb4a92de862ff3ca14dbdd32
 */
trait DraggableModelTrait
{
    /**
     * Boot the DraggableModelTrait trait for a model.
     */
    public static function bootDraggableModelTrait()
    {
        /**
         * Add a global scope to the model that orders the results by the position column.
         */
        static::addGlobalScope(function ($query) {
            return $query->orderBy('position');
        });

        /**
         * This is not working as expected.
         *
         * It should set the position to the next available position based on
         * the sortableFilter scope when creating a new model.
         *
         * The problem is that in the original implementation the $model is
         * passed into the `sortableFilter` scope allowing it to consider the
         * range of positions when creating a new model.
         *
         * $max = static::sortableFilter($model)->max('position') ?? -1;
         *
         * With the addition of the optional callback in the `sortableFilter` it
         * throws an error because the `sortableFilter` scope is expecting a
         * callback, not a model instance.
         *
         * The solution is to remove the $model argument and the error goes away
         * but the position is not set correctly. It simply finds the max
         * position from all the records in the table and sets the new model to
         * the max + 1.
         *
         * While this is not ideal, I am leaving it as because at this point the
         * care factor is 0 and I see no problem as long as you are not
         * displaying the position in the UI. If you are, you can simple move
         * the item and the arrange method will update the positions correctly.
         */
        static::creating(function ($model) {
            $max = static::sortableFilter()->max('position') ?? -1;
            $model->position = $max + 1;
        });
    }

    public function move($position, ?Closure $callback = null): void
    {
        DB::transaction(function () use ($position, $callback) {
            $current = $this->position;
            $newPosition = $position;

            // If there was no position change, do nothing and exit early...
            if ($current === $newPosition) return;

            // Move the item out of the position stack...
            $this->update(['position' => -1]);

            // Apply the callback when fetching the block to shift positions
            $block = static::sortableFilter($callback)
                ->whereBetween('position', [min($current, $newPosition), max($current, $newPosition)]);

            // Determine the direction of the shift...
            $isDraggingDownwards = $current < $position;

            // Determine the direction of the shift and adjust positions accordingly...
            $isDraggingDownwards
                ? $block->decrement('position')
                : $block->increment('position');

            // Place item back in position stack...
            $this->update(['position' => $position]);

            $this->arrange($callback);
        });
    }

    /**
     * Arrange the items based on the sortable filter and update their positions.
     *
     * @param  Closure|null  $callback  Optional callback to modify the query conditions.
     */
    private function arrange(?Closure $callback = null): void
    {
        DB::transaction(function () use ($callback) {
            $position = 0;
            $items = static::sortableFilter($callback)->get();
            foreach ($items as $model) {
                $model->position = $position++;
                $model->save();
            }
        });
    }
}
