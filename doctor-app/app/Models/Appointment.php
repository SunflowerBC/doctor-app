<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $fillable =[
        'state',
        'appointmentDate'
    ];

    public function doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_appointment')
            ->withPivot('id', 'patient_id', 'hospital_id', 'user_id', 'appointment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
