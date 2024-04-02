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
        "surname",
        "patronymic"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hospital()
    {
        return $this->belongsToMany(Hospital::class);
    }
}
