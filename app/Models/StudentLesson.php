<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * -----------------------------------------------------------------------
     * RELATIONSHIPS
     * ------------------------------------------------------------------------
     */
    public function studentCourse()
    {
        return $this->belongsTo(StudentCourse::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
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
