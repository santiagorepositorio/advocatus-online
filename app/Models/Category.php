<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //Relacion uno a muchos
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
    public function folders(){
        return $this->hasMany('App\Models\Folder');
    }
    public function outlets(){
        return $this->hasMany('App\Models\Outlet');
    }

    //Relacion uno a muchos
    public function profiles(){
        return $this->hasMany('App\Models\Profile');
    }
    
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
