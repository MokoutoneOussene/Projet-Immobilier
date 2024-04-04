<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepenseBailleur extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function User() {
        return $this->belongsTo(User::class, 'users_id');
    }

    function Bailleur() {
        return $this->belongsTo(Bailleur::class, 'bailleurs_id');
    }
}
