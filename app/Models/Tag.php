<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    //Relacion muchos a muchos
    // public function posts(){
    //     return $this->belongsToMany('App\Models\Post');
    // }

    //Relacion muchos a muchos polimorfica
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}
