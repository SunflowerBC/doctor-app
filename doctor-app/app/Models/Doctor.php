<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $perPage = 7;

    protected  $fillable =[
        "name",
        "image",
        "category_id",
        "hospital_id",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hospital()
    {
        return $this->belongsToMany(Hospital::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
