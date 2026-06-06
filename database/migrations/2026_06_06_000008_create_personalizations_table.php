<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personalizations');
    }
};
