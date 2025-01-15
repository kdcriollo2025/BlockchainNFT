<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history_id',
        'type',
        'start_date',
        'end_date',
        'detail'
    ];

    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class, 'medical_history_id');
    }
}
