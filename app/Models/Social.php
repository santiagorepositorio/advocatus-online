<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa
    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
