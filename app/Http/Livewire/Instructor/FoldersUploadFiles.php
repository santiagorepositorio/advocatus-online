<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Category;
use App\Models\File;
use App\Models\Folder;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FoldersUploadFiles extends Component
{
    use AuthorizesRequests;
    public $folder, $file, $name, $user_id, $category_id, $status = 0;
    protected $rules = [
        'folder.name' => 'required',
        'folder.user_id' => 'required',
        'folder.category_id' => 'required',
    ];
    public function mount(){
        // $this->folder = $folder;
        $this->folder =  new Folder();
        // $this->authorize('dicatated', $folder);
    }
    public function render()
    {
        $categories = Category::where('status', 'curso')->pluck('name', 'id');
        $folders = Folder::where('user_id', auth()->user()->id)->get();
        return view('livewire.instructor.folders-upload-files', compact('folders', 'categories'));
    }
    public function edit(Folder $folder){
        $this->folder = $folder;
    }

    public function update(){
        $this->validate();
        $this->folder->save();        
        // $this->folder =  new Folder();
        $this->folder = Folder::find($this->folder->id);
        $this->folder =  new Folder();
    }
    public function store(){
        // $this->validate([
        //     'name' => 'required',            
        //     'user_id' => 'required',
        //     'category_id' => 'required'
        // ]);
        Folder::create([
            'name' => $this->name,           
            'user_id' =>  auth()->user()->id,
            'status' => 3,
            'category_id' => $this->category_id,
        ]);
        $this->reset('name', 'user_id', 'category_id');
        $this->folder = Folder::find($this->folder->id);
        $this->folder =  new Folder();
    }
    public function destroy(Folder $folder){
        $folder->delete();
        $this->folder = Folder::find($this->folder->id);
        $this->folder =  new Folder();
    }
    public function privado(Folder $folder1){
        if ($folder1->status == 3 || ($folder1->status == 0 && $folder1->status != 2)) {
            $folder1->status = 2;
            $folder1->save();
        } 
    }
    public function publico(Folder $folder1){
        if ($folder1->status == 2 || ($folder1->status == 0 && $folder1->status != 3)) {
            $folder1->status = 3;
            $folder1->save();
        } 
    }

}
