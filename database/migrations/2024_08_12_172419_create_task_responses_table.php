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
        Schema::create('task_responses', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('status',['Pending','Checking','Fail','Pass'])->default('Pending');
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
        Schema::dropIfExists('task_responses');
    }
};
