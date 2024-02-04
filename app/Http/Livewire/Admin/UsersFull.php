<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersFull extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        // $users = User::where('name', 'LIKE', '%'. $this->search .'%')
        //             ->orWhere('email', 'LIKE', '%'. $this->search .'%')
        //             ->where('status', '===', 4)
        //             ->paginate(8);

                    $users = User::where(function($query) {
                        $query->where('name', 'LIKE', '%'. $this->search .'%')
                              ->orWhere('email', 'LIKE', '%'. $this->search .'%');
                                })     
                                ->where('status', '!=', 4)                         
                                ->paginate(8);
        return view('livewire.admin.users-full', compact('users'));
    }
    public function limpiar_page(){
        $this->reset('page');
        
    }
}
