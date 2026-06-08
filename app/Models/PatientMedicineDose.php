<?php

namespace App\Models;

use App\Models\PatientMedicine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientMedicineDose extends Model
{
    use HasFactory;

    protected $table = 'patient_medicine_doses';

    protected $fillable = [
        'patient_id',
        'patient_medicine_id',
        'scheduled_at',
        'taken_at',
        'status',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'taken_at' => 'datetime',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function patientMedicine(): BelongsTo
    {
        return $this->belongsTo(PatientMedicine::class, 'patient_medicine_id');
    }
}

