<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // relacion muchos a muchos

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

      //Relacion uno a uno polimorfica

      public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}

