<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorInstruction extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'patient_medicine_id',
        'note',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function patientMedicine(): BelongsTo
    {
        return $this->belongsTo(PatientMedicine::class, 'patient_medicine_id');
    }
}
