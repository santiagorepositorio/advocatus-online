<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    //Relacion Uno a Muchos
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //Relacion Inversa Uno a muchos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion Polimorfica uno a Muchos
    public function questionable()
    {
        return $this->morphTo();
    }
}
