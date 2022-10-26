<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCentre extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'type'
    ];

    public function centres()
    {
        return $this->hasMany(Centre::class);
    }
}
