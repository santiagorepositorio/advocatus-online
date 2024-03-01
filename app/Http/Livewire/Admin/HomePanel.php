<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

class HomePanel extends Component
{
   



    public function render()
    {
        
        //return $userCounts;
        return view('livewire.admin.home-panel');
    }
}
