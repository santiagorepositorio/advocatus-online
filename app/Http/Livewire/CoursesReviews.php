<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Review;
use Livewire\Component;

class CoursesReviews extends Component
{
    public $course_id, $comment;
    public $model;
    public $rating = 5;
    public $cant = 5;
    public $com_cant;
    public $comment_reg = [
        'comment' => '',
        'commentable_id' => null,
    ];
    public function mount(Course $course)
    {
        $this->course_id = $course->id;
      
    }

    public function getCommentsProperty()
    {
        return $this->model->comments()->take($this->cant)->orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        $course = Course::find($this->course_id);
        $commentsCount = Comment::where('commentable_id', $this->model->id)->count();

        return view('livewire.courses-reviews', compact('course','commentsCount'));
    }
    public function store()
    {
        $this->validate([
            'comment' => 'required'
        ]);
        // $course = Course::find($this->model->id);
        // dd($this->model->id);
        $this->model->comments()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
        $this->reset('comment');
        $this->emit('render');
    }
}
