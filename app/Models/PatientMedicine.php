<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientMedicine extends Model
{
    use HasFactory;

    protected $table = 'patient_medicines';

    protected $fillable = [
        'patient_id',
        'medicine_id',
        'dosage',
        'time_to_take',
        'before_after_food',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'time_to_take' => 'datetime:H:i',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}

