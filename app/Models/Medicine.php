<?php

namespace App\Models;

use App\Models\PatientMedicine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function patientMedicines(): HasMany
    {
        return $this->hasMany(PatientMedicine::class, 'medicine_id');
    }
}

