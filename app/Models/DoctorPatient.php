<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DoctorPatient extends Pivot
{
    protected $table = 'doctor_patient';

    public $incrementing = true;

    protected $fillable = ['doctor_id', 'patient_id'];
}

