<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude', 'user_id', 'category_id',
    ];
    public $appends = [
        'coordinate', 'map_popup_content',
    ];
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="'.route('outlets.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
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
        // $mapPopupContent .= '<div class="my-2"><strong>'.__('Direccion').':</strong><br>'.$this->address.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Ubicación').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
