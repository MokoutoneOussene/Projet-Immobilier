<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Immeuble() {
        return $this->hasMany(Immeuble::class);
    }

    function Maison() {
        return $this->hasMany(Maison::class);
    }

    function ContratBailleur() {
        return $this->hasMany(ContratBailleur::class);
    }

    function DepenseBailleur() {
        return $this->hasMany(DepenseBailleur::class);
    }
}
