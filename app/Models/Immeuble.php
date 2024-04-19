<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Bailleur() {
        return $this->belongsTo(Bailleur::class, 'bailleurs_id', 'id');
    }

    function ContratBailleur() {
        return $this->hasMany(ContratBailleur::class);
    }

    function maisons() {
        return $this->hasMany(Maison::class, 'immeubles_id', 'id');
    }
}
