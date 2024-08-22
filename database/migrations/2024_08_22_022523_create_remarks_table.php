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
        Schema::create('remarks', function (Blueprint $table) {
            $table->id();

            $table->integer('completion_grade')->nullable();
            $table->integer('assessment_grade')->nullable();
            $table->text('remarks')->nullable();

            $table->integer('course_id')->nullable();
            $table->integer('step_id')->nullable();

            $table->integer('batch_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('task_id')->nullable();

            $table->enum('type',['Intro','Fundamental','Full Skill'])->nullable();
            $table->enum('status',['Pending','Checking','Checked'])->default('Pending');

            $table->integer('user_id')->nullable();
            $table->integer('checked_by')->nullable();
            
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarks');
    }
};
