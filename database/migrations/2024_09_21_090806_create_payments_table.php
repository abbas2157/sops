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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->integer('course_id')->nullable();

            $table->string('gateway')->nullable();
            $table->string('receipt')->nullable();
            $table->integer('total_price')->nullable();

            $table->enum('status',['Pending','Paid','Coupon'])->default('Pending');
            $table->integer('coupon_id')->nullable();
            
            $table->integer('received_by')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
