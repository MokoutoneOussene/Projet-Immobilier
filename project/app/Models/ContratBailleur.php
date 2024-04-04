<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratBailleur extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Bailleur() {
        return $this->belongsTo(Bailleur::class, 'bailleurs_id');
    }

    function Immeuble() {
        return $this->belongsTo(Immeuble::class, 'immeubles_id');
    }

    function User() {
        return $this->belongsTo(User::class, 'users_id');
    }
}
