<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start');
            $table->integer('duration');
            $table->string('trainer');
            $table->integer('seat_count');
            $table->enum('is_exam',['yes','no']);
            $table->enum('is_certificate',['yes','no']);
            $table->enum('language',['english','arabic']);
            $table->integer('percentage_certificate');
            $table->tinyInteger('attendance_questionnaire')->default('0');
            $table->tinyInteger('image')->default('0');
            $table->tinyInteger('study')->default('0');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
