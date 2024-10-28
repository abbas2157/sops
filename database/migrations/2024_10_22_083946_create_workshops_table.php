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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('title')->nullable();
            $table->date('workshop_date', 0)->nullable();
            $table->time('workshop_time', 0)->nullable();
            $table->string('duration')->nullable();
            $table->enum('type',['Onsite','Online'])->default('Online');
            $table->string('workshop_link')->nullable();
            $table->text('payload')->nullable();
            $table->string('address')->nullable();
            $table->integer('trainer_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
