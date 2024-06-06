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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('projectID')->autoIncrement();
            $table->integer('userID')->nullable(false);
            $table->integer('customerID')->nullable(false);
            $table->string('projectName')->nullable(false);
            $table->string('projectType')->nullable(false);
            $table->double('pricing')->nullable(false);
            $table->date('dueDate')->nullable(false);
            $table->date('startDate')->nullable(false);
            $table->string('notes')->nullable(false);
            $table->string('status')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
