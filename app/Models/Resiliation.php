<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resiliation extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Location() {
        return $this->belongsTo(Location::class, 'locations_id');
    }
}
