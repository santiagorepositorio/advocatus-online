<?php

namespace App\Http\Livewire\Folder;

use App\Models\Category;
use App\Models\File;
use App\Models\Folder;
use Livewire\Component;
use Livewire\WithPagination;

class FoldesFile extends Component
{
    public $category_id;

    use WithPagination;
    // public $folder, $file, $name;

    // public function mount(Folder $folder){
    //     $this->folder = $folder;

    //     $this->file = new File();
    // }
    public function render()
    {
        $folders = Folder::where('status', 3)
            ->when($this->category_id, function ($query, $categoryId) {
                return $query->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                });
            })
            ->latest('id')
            ->paginate(8);

        $categories = Category::where('status', 'Curso')->get();

        return view('livewire.folder.foldes-file', compact('folders', 'categories'));
    }
    public function resetFilters()
    {
        $this->reset(['category_id']);
    }
}
