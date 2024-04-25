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
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('available_on_whatsapp')->nullable();
            $table->string('city_from')->nullable();
            $table->string('city_currently_living_in')->nullable();
            $table->string('employed_status')->nullable();
            $table->string('study_status')->nullable();
            $table->string('has_computer_and_internet')->nullable();
            $table->string('skill_experience')->nullable();
            $table->text('description');
            $table->integer('created_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainees');
    }
};
