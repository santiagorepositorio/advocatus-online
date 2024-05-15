<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'comments'];
    

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    const PREINSCRITO = 1;
    const INSCRITO = 2;
    const CERTIFICADO = 3;
    
    public function getRatingAttribute(){
        if($this->comments_count){
            return round($this->comments->avg('rating'), 1);
        }else{
            return 1;
        }
        
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    //query scope
    public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id){
        if($level_id){
            return $query->where('level_id', $level_id);
        }
    }
    //Relacion uno a uno 
    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
    }

    public function certificate()
    {
        return $this->hasOne('App\Models\Certificate');
    }
     //Relacion uno a muchos

     public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    //Relacion uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    //Relacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    
    //Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relacion hasManyThrough
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }
}
