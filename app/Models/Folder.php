<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const PRIVADO = 2;
    const PUBLICO = 3;

    protected $guarded = ['id'];

    //Relacion uno a muchos

    public function files(){
        return $this->hasMany('App\Models\File');
    }


    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // public function category(){
    //     return $this->belongsTo('App\Models\Category');
    // }
    public function category()
{
    return $this->belongsTo(Category::class);
}

}
