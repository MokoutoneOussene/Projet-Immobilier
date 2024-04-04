<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    // function Location() {
    //     return $this->hasOne(Location::class);
    // }

    function Immeuble() {
        return $this->belongsTo(Immeuble::class, 'immeubles_id');
    }
    
    function location() {
        return $this->hasOne(Location::class, 'maisons_id');
    }
}
