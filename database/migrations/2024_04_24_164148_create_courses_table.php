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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->string('detail_url')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('list')->default(0);
            $table->string('duration')->nullable();
            $table->string('lectures')->nullable();
            $table->string('skill_level')->nullable();
            $table->string('intro_module')->nullable();
            $table->string('fundamentals_module')->nullable();
            $table->string('full_skill_development')->nullable();
            $table->string('interactive_sessions')->nullable();
            $table->string('language')->nullable();
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
