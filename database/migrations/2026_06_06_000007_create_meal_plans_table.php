<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->string('day');
            $table->string('meal_time');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_plans');
    }
};
