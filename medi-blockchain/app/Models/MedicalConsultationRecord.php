<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalConsultationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history_id',
        'consultation_date',
        'reported_symptoms',
        'diagnosis',
        'treatment'
    ];

    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class, 'medical_history_id');
    }
}
