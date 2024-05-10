<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Livewire\Component;

class SearchFolder extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-folder');
    }
    public function getResultsProperty(){
        return Folder::where('name', 'LIKE', '%'.$this->search.'%')
        ->where('status', 3)
        ->take(10)            
        ->get();
    }
}
