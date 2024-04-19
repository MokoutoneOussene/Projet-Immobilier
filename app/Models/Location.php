<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Locataire() {
        return $this->belongsTo(Locataire::class, 'locataires_id');
    }

    function Maison() {
        return $this->belongsTo(Maison::class, 'maisons_id');
    }

    function Encaissement() {
        return $this->hasOne(Encaissement::class, 'locations_id')->latest();
    }

    function Resiliation() {
        return $this->hasOne(Resiliation::class, 'locations_id')->latest();
    }

    function User() {
        return $this->belongsTo(User::class, 'users_id');
    }
}
