<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;



    protected $fillable = [
        'nom',
        'image',
        'locale',
        'promo_id',
        'desc',
        'tel',
        'price'
    ];

    public function promotions()
    {
        return $this->belongsTo(Promotion::class);
    }
}
