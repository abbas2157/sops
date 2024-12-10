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
        Schema::create('batch_trainers', function (Blueprint $table) {
            $table->id();
            $table->integer('batch_id')->nullable();
            $table->integer('trainer_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->enum('course_module',['Fundamental','Full Skill'])->nullable();
            $table->integer('assigned_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_trainers');
    }
};
