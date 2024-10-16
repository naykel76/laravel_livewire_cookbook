<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_lessons', function (Blueprint $table) {
            $table->id();
            $table->dateTime('completed_at')->nullable();
            $table->foreignId('lesson_id')->constrained();
            $table->foreignId('student_course_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_lessons');
    }
};
