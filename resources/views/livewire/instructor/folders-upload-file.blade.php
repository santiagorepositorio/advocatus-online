<div>
    @foreach ($folder->files as $item)
    <article class="card mt-4" x-data="{open: false}">
        <div class="card-body">
            
            @if($file->id == $item->id)
                <form wire:submit.prevent="update">
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="file.name" class="form-input w-full">
                    </div>
                    @error('file.name')
                        <span class="text-xs text-red-500"> {{ $message }}</span>
                    @enderror

                    <div class="mt-4 flex justify-end">
                        <button class="btn btn-danger" wire:click="cancel">Cancelar</button>
                        <button class="btn btn-primary ml-2">Actualizar</button>
                    </div>
                </form>
            @else
                <div>
                    <header>
                        <div x-on:click="open = !open" class="flex justify-between items-center cursor-pointer">
                            <h1 ><i class="far fa-play-circle text-blue-500 mr-1"></i>Archivo: {{ $item->name }}</h1><i class="fas fa-sort-down" :class="open ? 'fa-sort-up' : 'fa-sort-down'"></i>
                        </div>
                        
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                       
                        <div class="my-2">
                            <button type="submit" class="btn btn-primary text-sm"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button type="button" class="btn btn-danger text-sm"
                            wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>
                        <div class="mb-4">
                            {{-- @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-'.$item->id)) --}}
                        </div>
                        <div >
                            @livewire('instructor.file-resources', ['archivo' => $item], key('file-resources-'.$item->id))
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </article>
@endforeach
<div class="mt-4" x-data="{ open: false }">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
        <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
        Agregar nuevo archivo
    </a>
    <article class="card" x-show="open">
        <div class="card-body">
            <h1 class="text-xl font-bold mb-4">Agregar Nuevo Archivo</h1>
            <div class="mb-4">
                <div class="flex items-center">
                    <label class="w-32">Nombre:</label>
                    <input wire:model="name" class="form-input w-full">
                </div>
                @error('name')
                    <span class="text-xs text-red-500"> {{ $message }}</span>
                @enderror

                
            </div>
            <div class="flex justify-end">
                <button class="btn btn-danger" x-on:click="open = false" >Cancelar</button>
                <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
            </div>
        </div>

    </article>
</div>
</div>
