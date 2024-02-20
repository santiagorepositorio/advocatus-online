<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function image(Post $post){
        /* $image = Storage::get($post->image_path);

        return response($image)
            ->header('Content-Type', 'image/jpeg'); */

        return Storage::temporaryUrl(
            $post->image_path,
            now()->addMinutes(5)
        );
    }
}
