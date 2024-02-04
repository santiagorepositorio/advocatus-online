<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
