<?php

namespace App\Http\Livewire\Folder;

use App\Models\File;
use App\Models\Folder;
use Livewire\Component;
use Livewire\WithPagination;

class FoldesShow extends Component
{
    use WithPagination;

    public $folder, $identificador, $file, $documento, $open = false;
    public function mount(Folder $folder){
        $this->identificador = rand();
        $this->folder = $folder;
        // $this->file = new File();
    }
    protected $rules = [
        'file.name' => 'required',
        'file.resource.url' => 'required'
    ];
    public function render()
    {
        return view('livewire.folder.foldes-show');
    }
    public function ver(File $item){  
        $this->documento = $item->resource->url;
        $this->open = true;
    }

    public function download(File $item)
    {
        return response()->download(storage_path('app/public/' . $item->resource->url));
    }
}
