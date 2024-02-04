<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\Publicity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $publicities = Publicity::where('status', '1')->get();
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);
        $profiles = Profile::where('status', '3')
                                
        ->latest('id')
        ->paginate(8);
        return view('welcome', compact('courses', 'profiles', 'publicities'));
    }
    
}
