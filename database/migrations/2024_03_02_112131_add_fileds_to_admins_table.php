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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('english_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birthday')->nullable();
            $table->string('academicـcertificate')->nullable();
            $table->string('main_training_area')->nullable();
            $table->string('accreditation')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('cv')->nullable();
            $table->string('accreditationـcertificate')->nullable();
            $table->string('pic')->nullable();
            $table->string('main_job_field')->nullable();
            $table->string('main_field_of_consulting')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
};
