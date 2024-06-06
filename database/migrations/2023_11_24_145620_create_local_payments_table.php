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
        Schema::create('local_payments', function (Blueprint $table) {
            $table->id('paymentID')->autoIncrement();
            $table->string('paymentName')->nullable(false);
            $table->string('clientID')->nullable(true);
            $table->string('secret')->nullable(true);
            $table->string('imagePath')->nullable(true);
            $table->string('status')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_payments');
    }
};
