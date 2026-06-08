<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient_medicine_doses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('patient_medicine_id')->constrained('patient_medicines')->cascadeOnDelete();

            // When the dose was scheduled to be taken
            $table->dateTime('scheduled_at');

            // When the patient actually took it (nullable until taken)
            $table->dateTime('taken_at')->nullable();

            $table->string('status')->default('pending');
            // pending | on_time | late | missed

            $table->timestamps();

            $table->unique(['patient_id', 'patient_medicine_id', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_medicine_doses');
    }
};

