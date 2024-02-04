<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
   // protected $withCount = ['students', 'reviews'];
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 1;
        }
        
    }

     //query scope
     public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }
    public function getRouteKeyName()
    {
        
        return "slug";
    }
    //Relacion uno a uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

     //Relacion uno a uno polimorfica

     public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

}
