<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class CustomersIndex extends Component
{
    use WithPagination;
    public $search;
    public $status = 0;
    protected $paginationTheme = "bootstrap";

    
    public function render()
    {
        $users = User::where(function($query) {
            $query->where('name', 'LIKE', '%'. $this->search .'%')
                  ->orWhere('email', 'LIKE', '%'. $this->search .'%');
        })
        ->when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->where('status', '!=', 4)
        ->paginate(8);
        return view('livewire.admin.customers-index', compact('users'));
    }
    public function limpiar_page(){
        $this->reset('page', 'status');
        
    }

}
