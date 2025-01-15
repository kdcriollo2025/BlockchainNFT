<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'address',
    ];
    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class, 'patient_id');
    }
}
