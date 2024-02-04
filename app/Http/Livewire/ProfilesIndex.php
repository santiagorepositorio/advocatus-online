<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilesIndex extends Component
{   
    public $category_id;
 
    use WithPagination;

    public function render()
    {
        $profiles = Profile::where('status', 3)
                                ->category($this->category_id)                                
                                ->latest('id')
                                ->paginate(8);
        $categories = Category::where('status', 'Abogados')->get();
        //return $profiles;
        return view('livewire.profiles-index', compact('profiles', 'categories'));
    }

        public function resetFilters(){
        $this->reset(['category_id']);
    }
}
