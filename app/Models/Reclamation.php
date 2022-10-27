<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'description',
        'date',
        'image',
        'mail',
    ];

    

    public function reponse()
    {
        return $this->belongsTo(Reponse::class);
    }



}
