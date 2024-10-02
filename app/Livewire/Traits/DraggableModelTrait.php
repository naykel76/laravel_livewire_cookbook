<?php

namespace App\Livewire\Traits;

use Illuminate\Support\Facades\DB;

/**
 * This trait is a little inflexible in that it assumes the model has a position
 * column and a sortableFilter scope with the exact query conditions for the
 * items you want to sort.
 *
 * For example, if you have a `ToDo` model and you want to select the `ToDos` by
 * `user_id`, you need to ensure the `sortableFilter` scope is set up to filter
 * by `user_id`, this can not be done dynamically from the component class.
 *
 * $query->whereUserId(User::first()->id);
 *
 * You can make it more flexible by adding a callback function that you can pass
 * in to the sortableFilter scope directly from the component or controller.
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

    public function move($position)
    {
        DB::transaction(function () use ($position) {
            $current = $this->position;
            $newPosition = $position;

            // If there was no position change, do nothing and exit early...
            if ($current === $newPosition) return;

            // Move the item out of the position stack...
            $this->update(['position' => -1]);

            // Grab the shifted block and shift it up or down...
            $block = static::sortableFilter($this)->whereBetween('position', [
                min($current, $newPosition),
                max($current, $newPosition),
            ]);

            // Determine the direction of the shift...
            $isDraggingDownwards = $current < $position;

            // Adjust the positions: decrement for moving down, increment for moving up
            $isDraggingDownwards
                ? $block->decrement('position')
                : $block->increment('position');

            // Place item back in position stack...
            $this->update(['position' => $position]);

            $this->arrange();
        });
    }

    public function arrange()
    {
        DB::transaction(function () {
            $position = 0;
            foreach (static::sortableFilter($this)->get() as $model) {
                $model->position = $position++;
                $model->save();
            }
        });
    }
}
