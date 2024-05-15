<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }
    public function dicatated(?User $user, Course $course)
    {
        if ($course->user_id ==  $user->id) {
            return true;
        } else {
            return false;
        }
    }
    public function revision(?User $user, Course $course)
    {
        if ($course->status ==  2) {
            return true;
        } else {
            return false;
        }
    }
    public function valued(?User $user, Course $model)
    {
        return !Comment::where('user_id', $user->id)
            ->where('commentable_type', Course::class)
            ->where('commentable_id', $model->id)
            ->exists();
    }
    // public function valued(?User $user, $model)
    // {        
    //     if ($model instanceof Course) {
    //         dd($user);
    //         return!Comment::where('user_id', $user->id)
    //         ->where('commentable_type', Course::class)
    //         ->where('commentable_id', $model->id)
    //         ->exists();
        
    //     } elseif ($model instanceof Profile) {
    //         dd($user);
    //         return!Comment::where('user_id', $user->id)
    //         ->where('commentable_type', Profile::class)
    //         ->where('commentable_id', $model->id)
    //         ->exists();
    //     }
        
        
    // }
}
