<?php

namespace App\Http\Livewire\Instructor;

use App\Models\File;
use App\Models\Folder;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class FoldersUploadFile extends Component
{
    public $folder, $file, $name, $url;
    protected $rules =[
        'file.name' => 'required',
       
    ];
    public function mount(Folder $folder){
        $this->folder = $folder;
    
        $this->file = new File();
    }
    public function render()
    {
        return view('livewire.instructor.folders-upload-file');
    }
    public function edit(File $file){
        $this->resetValidation();
        $this->file = $file;

    }
    public function update(){

        $this->validate();

        $this->file->save();
        $this->file = new File();
        $this->folder = Folder::find($this->folder->id);
    }

    public function cancel(){
        $this->file = new File();
    }

    public function store(){
        $rules =[
            'name' => 'required',
          
        ];  

        $this->validate($rules);
        File::create([
            'name' => $this->name,            
            'folder_id' => $this->folder->id,
        ]);
        $this->reset(['name']);
        $this->folder = Folder::find($this->folder->id);
    }
    public function destroy(File $file){
        if ($file->resource && $file->resource->url) {
            $fileUrl = $file->resource->url;
        
            // Verificar si el archivo existe antes de intentar eliminarlo
            if (Storage::exists($fileUrl)) {
                // Eliminar el archivo si existe
                Storage::delete($fileUrl);
            }
        
            // Eliminar el recurso asociado
            $file->resource->delete();
        } else {
            // Manejar el caso cuando $file->resource es null o la propiedad 'url' está ausente
            // Por ejemplo, puedes registrar un mensaje de error o realizar alguna otra acción
        }
        $file->delete();        
        $this->folder = Folder::find($this->folder->id);
    }
    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->file->resource->url));
    }
}
