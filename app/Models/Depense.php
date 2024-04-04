<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function User() {
        return $this->belongsTo(User::class, 'users_id');
    }
}
