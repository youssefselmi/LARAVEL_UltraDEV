<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'with',
        'for',
        'reason',
        'date',
        'type_id'
    ];

    public function types()
    {
        return $this->belongsTo(TypeAppointment::class);
    }
}
