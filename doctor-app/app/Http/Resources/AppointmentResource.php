<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->resource->with(['category']);
        return [
            'id' => $this->id,
            'state' => $this->state,
            'appointmentDate' => $this->appointment_date,
            'user' => new UserResource($this->user),
            'doctor' => new DoctorCollection($this->doctor),
            'patient' => new PatientCollection($this->patient),
            'hospital' => new HospitalCollection($this->hospital)
        ];
    }
}
