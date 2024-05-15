<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'body',
        'user_id',
        'published',
        'image_path'
    ];
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    public function scopeFilter($query, $filters){
        $query->when($filters['category'] ?? null, function ($query, $category) {
            $query->whereIn('category_id', $category);
        })->when($filters['order'] ?? 'new', function ($query, $order) {
            $sort = $order === 'new' ? 'desc' : 'asc';
            $query->orderBy('published_at', $sort);
        })->when($filters['tag'] ?? null, function ($query, $tag){
            $query->wherehas('tags', function($query) use($tag){
                $query->where('tags.name', $tag);
            });
        });

    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    protected function title(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value)
        );
    }
    protected function image(): Attribute
    {
        return new Attribute(
            /* get: fn () => $this->image_path ?? 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg' */

            get: function () {
                if ($this->image_path) {

                    if (substr($this->image_path, 0, 8) === 'https://') {
                        return $this->image_path;
                    }

                    return Storage::url($this->image_path);

                    /* return route('posts.image', $this); */

                    /* return Storage::temporaryUrl(
                        $this->image_path,
                        now()->addMinutes(5)
                    ); */
                } else {
                    return 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';
                }
            }

        );
    }



    //Relacion uno a muchos inversa
    //Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion uno a uno inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relacion muchos a muchos

    // public function tags(){
    //     return $this->belongsToMany('App\Models\Tag');
    // }

    //Relacion uno a uno polimorfica
    //Relacion uno a muchos polimorfica
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }
    //Relacion muchos a muchos polimorfica
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
