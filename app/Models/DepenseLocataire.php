<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepenseLocataire extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function User() {
        return $this->belongsTo(User::class, 'users_id');
    }

    function Locataire() {
        return $this->belongsTo(Locataire::class, 'locataires_id');
    }
}
