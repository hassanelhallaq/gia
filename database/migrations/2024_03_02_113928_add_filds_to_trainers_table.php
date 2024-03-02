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
        Schema::table('trainers', function (Blueprint $table) {
            $table->string('english_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birthday')->nullable();
            $table->string('tot')->nullable();
            $table->string('main_training_area')->nullable();
            $table->string('academicـcertificate')->nullable();
            $table->string('accreditation')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('cv')->nullable();
            $table->string('accreditationـcertificate')->nullable();
            $table->string('pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainers', function (Blueprint $table) {
            //
        });
    }
};
