<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;

         
    
    protected $fillable = [
        'nom',
        'image',
        'locale',
        'type_id'
    ];

    public function types()
    {
        return $this->belongsTo(TypeCentre::class);
    }
}
