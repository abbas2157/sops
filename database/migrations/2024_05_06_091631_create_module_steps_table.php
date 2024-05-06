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
        Schema::create('module_steps', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->integer('course_id');
            $table->string('steps_no')->nullable();
            $table->string('title')->nullable();
            $table->string('video')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('assignment')->nullable();
            $table->tinyInteger('lock')->default(0);
            $table->integer('created_by')->nullable();
            $table->enum('type',['Intro','Fundamental','Full Skill'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_steps');
    }
};
