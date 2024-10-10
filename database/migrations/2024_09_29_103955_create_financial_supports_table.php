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
        Schema::create('financial_supports', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->integer('course_id')->nullable();

            $table->string('level_of_education')->nullable();
            $table->string('currency')->nullable();
            $table->string('annual_income')->nullable();
            $table->string('employee_status')->nullable();
            $table->text('financial_aid')->nullable();

            $table->string('amount_you_can_pay')->nullable();
            $table->string('amount_must_pay')->nullable();
            $table->string('your_goals')->nullable();

            $table->enum('status',['Pending','Accepted','Declined'])->default('Pending');
            $table->integer('updated_by')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_supports');
    }
};
