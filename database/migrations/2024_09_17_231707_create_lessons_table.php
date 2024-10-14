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
            $table->mediumText('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('image_name')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->unsignedBigInteger('module_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
