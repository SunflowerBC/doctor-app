<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;
    public $fillable =[
        'state',
        'appointment_date',
        'hospital_id',
        'patient_id',
        'doctor_id',

    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, );
    }



    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
