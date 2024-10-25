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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('step_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('type',['Course','Trainer','Other'])->default('Other');
            $table->enum('status',['Pending','Checking','Fail','Pass'])->default('Pending');
            $table->text('remarks')->nullable();
            $table->integer('is_move')->default(0);
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
        Schema::dropIfExists('assignments');
    }
};
