<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'doctor_patient', 'doctor_id', 'patient_id')
            ->withTimestamps();
    }

    public function doctors()
    {
        return $this->belongsToMany(User::class, 'doctor_patient', 'patient_id', 'doctor_id')
            ->withTimestamps();
    }

    public function appointmentsAsDoctor()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function appointmentsAsPatient()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function patientMedicines()
    {
        return $this->hasMany(PatientMedicine::class, 'patient_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'patient_id');
    }

    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'doctor_id');
    }

    public function mealPlans()
    {
        return $this->hasMany(MealPlan::class, 'patient_id');
    }

    public function personalizations()
    {
        return $this->hasMany(Personalization::class, 'patient_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'doctor_id');
    }

    public function receivedReports()
    {
        return $this->hasMany(Report::class, 'patient_id');
    }

    public function systemAlerts()
    {
        return $this->hasMany(SystemAlert::class, 'user_id');
    }

    public function givenInstructions()
    {
        return $this->hasMany(DoctorInstruction::class, 'doctor_id');
    }

    public function receivedInstructions()
    {
        return $this->hasMany(DoctorInstruction::class, 'patient_id');
    }
}

