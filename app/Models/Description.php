<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a uno inversa

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

}
