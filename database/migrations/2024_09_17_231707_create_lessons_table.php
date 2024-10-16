<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('type');
            $table->longText('body')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
