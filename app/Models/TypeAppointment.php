<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
