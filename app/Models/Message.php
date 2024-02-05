<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Message extends Model
{
    use HasFactory;
 

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_phone', 'phone');
    }


    //mutadores



}
