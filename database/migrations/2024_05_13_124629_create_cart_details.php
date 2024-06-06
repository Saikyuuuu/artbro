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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->binary('img_data');
            $table->string('art_name');
            $table->string('artist');
            $table->integer('price');
            $table->integer('quantity');

        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
