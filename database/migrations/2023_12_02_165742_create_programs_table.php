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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->date('start');
            $table->date('end');
            $table->string('content_one')->nullable();
            $table->text('content_two')->nullable();
            $table->enum('contact_type',['whatsapp','sms','email','whatsapp&sms','sms&email'])->default('email');
            $table->enum('register',['qr','visit','selfie'])->default('qr');
            $table->string('image');
            $table->string('color');
            $table->string('file');
            $table->string('attendance_method');
            $table->enum('show_invited',['yes','no'])->default('yes');
            $table->string('theme_name');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
