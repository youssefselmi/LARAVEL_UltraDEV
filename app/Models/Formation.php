<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'mail_formateur',
        'nom_formateur',
        'formateur_profession',
        'image',
        'location_formation',
        'prix_formation',
        'duree_formation',
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
      
}
