<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'response',
    ];



    public function reclamation(){
        return $this->hasOne(Reclamation::class);
    }



}
