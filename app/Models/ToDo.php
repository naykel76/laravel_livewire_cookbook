<?php

namespace App\Models;

use App\Livewire\Traits\DraggableModelTrait;
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
     * This query scope is pretty inflexible, because there is no way to change
     * the query conditions from the component or controller when calling the
     * move method.
     *
     * For the sake of this example, we are will just return the first user_id
     * in the database which has seeded data.
     */
    protected function scopeSortableFilter(Builder $query): Builder
    {
        return $query->whereUserId(User::first()->id);
    }
}
