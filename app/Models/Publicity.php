<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    const BORRADOR = 1;
    const ACTIVO = 2;
    const INACTIVO = 3;
    //Relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
