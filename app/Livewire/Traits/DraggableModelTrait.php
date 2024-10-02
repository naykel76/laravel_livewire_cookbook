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
         * Set the position to the next available position based on the
         * sortableFilter scope when creating a new model.
         *
         * The creating method in Laravel's Eloquent ORM hooks into the model's
         * lifecycle, firing before a new model is saved to the database.
         */
        static::creating(function ($model) {
            $max = static::sortableFilter($model)->max('position') ?? -1;
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
