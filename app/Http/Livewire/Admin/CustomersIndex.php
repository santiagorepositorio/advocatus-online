<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $users = User::where(function($query) {
            $query->where('name', 'LIKE', '%'. $this->search .'%')
                  ->orWhere('email', 'LIKE', '%'. $this->search .'%');
                    })
                    ->where('status', '!=', 4)
                    ->paginate(8);
        return view('livewire.admin.customers-index', compact('users'));
    }
    public function limpiar_page(){
        $this->reset('page');
        
    }
}
