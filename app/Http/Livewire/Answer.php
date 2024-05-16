<?php

namespace App\Http\Livewire;

use App\Models\Answer as ModelsAnswer;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Answer extends Component
{
    public $question;
    public $cant = 0;
    public $open = false;
    public $answer_created = [
        'open' => false,
        'body' => '',
    ];
    public $answer_to_answer = [
        'id' => null,
        'body' => '',
    ];
    public $answer_edit = [
        'id' => null,
        'body' => '',
    ];


    public function getAnswersProperty()
    {
        return $this->question->answers()->get()->take($this->cant * (-1));
    }
    public function store()
    {
        $this->validate([
            'answer_created.body' => 'required'
        ]);
        $this->question->answers()->create([
            'body' => $this->answer_created['body'],
            'user_id' => auth()->id(),
        ]);
        $this->cant += 1;
        $this->reset('answer_created');
    }
    public function answer_to_answer_store()
    {
        $this->validate([
            'answer_to_answer.body' => 'required'
        ]);
        $answer = $this->question->answers()->create([
            'body' => $this->answer_to_answer['body'],
            'user_id' => auth()->id(),
        ]);
        $this->cant += 1;
        $this->reset('answer_to_answer');
    }

    public function edit($answersId)
    {
        $answers = ModelsAnswer::find($answersId);
        $this->answer_edit = [
            'id' => $answers->id,
            'body' => $answers->body
        ];
    }
    public function cancel()
    {
        $this->reset('answer_edit');
    }
    public function update()
    {
        $this->validate([
            'answer_edit.body' => 'required'
        ]);
        $answers = ModelsAnswer::find($this->answer_edit['id']);
        if (Gate::allows('update', $answers)) {
            // $this->authorize('update', $answers);
            $answers->update([
                'body' => $this->answer_edit['body']
            ]);
        }
        $this->reset('answer_edit');
    }
    public function destroy($answersId)
    {
        $answers = ModelsAnswer::find($answersId);
        if (Gate::allows('delete', $answers)) {
        $answers->delete();}

        $this->reset('answer_edit');
    }
    public function show_more_answer()
    {
        if ($this->cant < $this->question->answers()->count()) {
            $this->cant = $this->question->answers()->count();
        } else {
            $this->cant = 0;
        }
    }

    public function render()
    {
        return view('livewire.answer');
    }
}
