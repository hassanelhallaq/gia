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
        Schema::table('programs', function (Blueprint $table) {
            $table->string('contract_number')->nullable();
            $table->integer('courses_count')->nullable();
            $table->integer('trainers_count')->nullable();
             $table->integer('country_id')->nullable();
             $table->string('logistics_services')->nullable();
             $table->string('registration_method')->nullable();
             $table->string('training_center')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            //
        });
    }
};
