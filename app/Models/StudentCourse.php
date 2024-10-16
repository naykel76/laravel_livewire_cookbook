<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    /**
     * -----------------------------------------------------------------------
     * RELATIONSHIPS
     * ------------------------------------------------------------------------
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class);
    }

    /**
     *-------------------------------------------------------------------------
     * QUERY SCOPES
     *-------------------------------------------------------------------------
     */

    /**
     *-------------------------------------------------------------------------
     * METHODS
     *-------------------------------------------------------------------------
     */
}
