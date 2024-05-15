<?php

namespace App\Http\Livewire;

use App\Models\Question as ModelsQuestion;
use Livewire\Component;

class Question extends Component
{
    public $model;
    public $message;
   
    public $cant = 5;

    public $question_edit = [
        'id' => null,
        'body' => '',
    ];
    

    public function getQuestionsProperty()
    {
        return $this->model->questions()->take($this->cant)->orderBy('created_at', 'desc')->get();
    }

    public function store()
    {
        $this->validate([
            'message' => 'required'
        ]);
        $this->model->questions()->create([
            'body' => $this->message,
            'user_id' => auth()->id(),
        ]);
      
        $this->message ='';
    }
    public function edit($questionsId)
    {
        $question = ModelsQuestion::find($questionsId);
        $this->question_edit = [
            'id' => $question->id,
            'body' => $question->body
        ];
    }
    public function cancel()
    {
        $this->reset('question_edit');
    }
    public function update()
    {
        $this->validate([
            'question_edit.body' => 'required'
        ]);
        $question = ModelsQuestion::find($this->question_edit['id']);
        $question->update([
            'body' => $this->question_edit['body']
        ]);
     
        $this->reset('question_edit');
    }
    public function destroy($questionsId)
    {
        $question = ModelsQuestion::find($questionsId);
        $question->delete();
    
        $this->reset('question_edit');
    }

    public function show_more_question()
    {
        $cantaNew = $this->cant;
        $this->cant += ($this->model->questions()->count() - $cantaNew);
    }

    public function render()
    {
        return view('livewire.question');
    }
}
