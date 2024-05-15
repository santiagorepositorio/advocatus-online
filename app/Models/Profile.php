<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['comments'];
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    public $appends = [
        'coordinate', 'map_popup_content',
    ];
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('profile.profile'),
        ]);
        $link = '<a href="'.route('edit.profile', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function getRatingAttribute(){
        if($this->comments_count){
            return round($this->comments->avg('rating'), 1);
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
    //Relacion uno a muchos

    public function socials()
    {
        return $this->hasMany('App\Models\Social');
    }
    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }
    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
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

    //Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Centro').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Contacto').':</strong><br>'.$this->phone.'</div>';
        // $mapPopupContent .= '<div class="my-2"><strong>'.__('Ubicación').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }

}
