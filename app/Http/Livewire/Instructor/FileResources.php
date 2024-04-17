<?php

namespace App\Http\Livewire\Instructor;

use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class FileResources extends Component
{
    use WithFileUploads;
    public $archivo, $file;

    public function mount(File $archivo)
    {
        $this->archivo =$archivo;
    }
    public function render()
    {
        return view('livewire.instructor.file-resources');
    }
    public function save()
    {
        $this->validate([
            'file' => 'required'
        ]);
        $nombreArchivo = $this->file->getClientOriginalName();
        $url = $this->file->storeAs('resources', $nombreArchivo);
        $this->archivo->resource()->create([
            'url' => $url
        ]);
        $this->archivo = File::find($this->archivo->id);
    }
    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->archivo->resource->url));
    }
    public function destroy()
    {
        Storage::delete($this->archivo->resource->url);
        $this->archivo->resource->delete();
        $this->archivo = File::find($this->archivo->id);
    }
 
}
