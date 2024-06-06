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
        Schema::create('sample_orders', function (Blueprint $table) {
            $table->id();
            $table->binary('pic');
            $table->string('art_name');
            $table->string('artist');
            $table->integer('price');
            $table->date('Order_Date');
            $table->string('Status');
            $table->string('Remarks');
            $table->string('Action');
            $table->string('Progress');
            $table->string('Message_Client');


        });     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
