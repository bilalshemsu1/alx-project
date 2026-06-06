<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\MealPlan;
use App\Models\Medicine;
use App\Models\PatientMedicine;
use App\Models\Personalization;
use App\Models\Report;
use App\Models\SystemAlert;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Doctor
        $doctor = User::create([
            'name'     => 'Dr. Sarah Ahmed',
            'email'    => 'doctor@example.com',
            'password' => Hash::make('password'),
            'role'     => 'doctor',
        ]);

        // Patient
        $patient = User::create([
            'name'     => 'John Doe',
            'email'    => 'patient@example.com',
            'password' => Hash::make('password'),
            'role'     => 'patient',
        ]);

        // Admin
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Link doctor ↔ patient
        $doctor->patients()->attach($patient->id);

        // Appointment
        Appointment::create([
            'doctor_id'        => $doctor->id,
            'patient_id'       => $patient->id,
            'appointment_date' => now()->addDays(3),
            'status'           => 'upcoming',
            'notes'            => 'Follow-up checkup',
        ]);

        // Medicine + prescription
        $medicine = Medicine::create([
            'name'        => 'Metformin 500mg',
            'description' => 'Used to treat type 2 diabetes',
        ]);

        PatientMedicine::create([
            'patient_id'       => $patient->id,
            'medicine_id'      => $medicine->id,
            'dosage'           => '1 tablet',
            'time_to_take'     => '08:00:00',
            'before_after_food'=> 'after',
            'start_date'       => now()->toDateString(),
            'end_date'         => now()->addMonths(3)->toDateString(),
        ]);

        // Task assigned by doctor
        Task::create([
            'patient_id'  => $patient->id,
            'doctor_id'   => $doctor->id,
            'title'       => 'Morning walk',
            'description' => '30 minutes brisk walk every morning',
            'type'        => 'activity',
            'due_datetime'=> now()->addDay()->setTime(7, 0),
            'status'      => 'pending',
        ]);

        // Meal plan
        foreach (['breakfast' => 'Oats with fruits', 'lunch' => 'Grilled chicken with salad', 'dinner' => 'Vegetable soup'] as $meal => $desc) {
            MealPlan::create([
                'patient_id'  => $patient->id,
                'day'         => 'Monday',
                'meal_time'   => $meal,
                'description' => $desc,
            ]);
        }

        // Personalization
        Personalization::create([
            'patient_id' => $patient->id,
            'data'       => [
                'theme'            => 'light',
                'notifications'    => true,
                'language'         => 'en',
                'health_goals'     => ['lose weight', 'control blood sugar'],
            ],
        ]);

        // Report from doctor
        Report::create([
            'doctor_id'  => $doctor->id,
            'patient_id' => $patient->id,
            'content'    => 'Patient blood sugar levels are improving. Continue current medication and diet plan.',
        ]);

        // System alert for patient
        SystemAlert::create([
            'user_id' => $patient->id,
            'type'    => 'reminder',
            'message' => 'Time to take your Metformin 500mg',
        ]);
    }
}
