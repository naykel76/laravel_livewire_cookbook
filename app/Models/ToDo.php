<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    protected static function booted()
    {
        // Override the default orderBy position and sort by position
        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
