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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('title')->nullable();
            $table->date('class_date', 0)->nullable();
            $table->time('class_time', 0)->nullable();
            $table->integer('duration')->nullable();
            $table->string('call_link')->nullable();
            $table->string('call_download_link')->nullable();
            $table->enum('type',['Fundamental','Full Skill'])->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->text('payload')->nullable();
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
        Schema::dropIfExists('class_schedules');
    }
};
