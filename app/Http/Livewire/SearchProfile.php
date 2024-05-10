<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class SearchProfile extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-profile');
    }
    public function getResultsProperty(){
        return Profile::where('name', 'LIKE', '%'.$this->search.'%')
        ->where('status', 3)
        ->take(10)            
        ->get();
    }
}
