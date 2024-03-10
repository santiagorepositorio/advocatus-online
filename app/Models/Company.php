<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    const PRODUCCION = 1;
    const INACTIVO = 2;
    const ACTIVO = 3;

        //Relacion uno a uno inversa

        public function user(){
            return $this->belongsTo('App\Models\User');
        }
}
