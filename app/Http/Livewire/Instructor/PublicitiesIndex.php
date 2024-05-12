<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Publicity;
use Livewire\Component;
use Livewire\WithPagination;

class PublicitiesIndex extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $publicities = Publicity::where('title', 'LIKE', '%'.$this->search.'%')->latest('id')->paginate(5);
        return view('livewire.instructor.publicities-index', compact('publicities'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
