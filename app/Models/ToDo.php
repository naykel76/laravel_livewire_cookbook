<?php

namespace App\Models;

use App\Livewire\Traits\DraggableModelTrait;
use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use DraggableModelTrait, HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This query scope defines the items that are eligible to be sorted. It
     * allows you to modify the query conditions using a callback function which
     * can be passed in when calling the move method in the component or
     * controller.
     *
     * @param  Builder  $query  The query builder instance.
     * @param  Closure|null  $callback  Optional callback to modify the query conditions.
     */
    protected function scopeSortableFilter(Builder $query, ?Closure $callback = null): Builder
    {
        if ($callback) {
            $callback($query);
        }

        return $query;
    }
}
