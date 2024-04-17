<div>
    <section class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden mt-8">
        <h1 class="text-center text-3xl text-gray-600">CARPETAS DE : {{ auth()->user()->name }} </h1><hr class="mt-2 mb-6">
        <p class="text-center text-gray-500 text-sm mb-6">{{ $categories }}</p>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($folders as $folder1)
                <article class="card mb-6 border-black" x-data="{ open: true }">
                    <div class="card-body bg-gray-100">
                        @if ($folder->id == $folder1->id)
                            <form wire:submit.prevent="update">
                                <div class="mb-4">
                                <input wire:model="folder.name" class="form-input w-full"
                                    placeholder="Ingrese el nombre de la carpeta">
                                @error('folder.name')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="mb-4">
                                    <select name="category" id="category" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200" wire:model="category_id">
                                        @foreach ($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                
                            </form>
                        @else
                            <header class="flex justify-between items-center">
                                {{-- fa-sort-amount-{{ open = true ? 'down' : 'up' }} --}}
                                <h1 x-on:click="open = !open" class="cursor-pointer"><i class="fas mr-2"
                                        :class="open ? 'fa-sort-amount-up' : 'fa-sort-amount-down'"></i>{{ $folder1->name }}</h1>
                                <div>
                                    <i class="fas fa-edit cursor-pointer text-blue-500"
                                        wire:click="edit({{ $folder1 }})"></i>
                                    <i class="fas fa-eraser cursor-pointer text-red-500"
                                        wire:click="destroy({{ $folder1 }})"></i>
                                    @if ($folder1->status == 3)
                                    <i class="fas fa-eye cursor-pointer text-green-500 text-gre"
                                    wire:click="privado({{ $folder1 }})"></i>
                                    @else
                                    <i class="fas fa-eye-slash cursor-pointer  text-black"
                                    wire:click="publico({{ $folder1 }})"></i>

                                  
                                    @endif
                                </div>
                            </header>
                            <div x-show="open">
                                @livewire('instructor.folders-upload-file', ['folder' => $folder1], key($folder1->id))
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
            <div x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva CARPETA
                </a>
                <article class="card" x-show="open">
                    <div class="card-body bg-gray-100">
                        <h1 class="text-xl font-bold mb-4">Agregar Nueva CARPETA</h1>
                        <div class="mb-4">
                            <input wire:model="name" placeholder="Escriba el nombre de la CARPETA"
                                class="form-input w-full">
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <select name="category" id="category" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200" wire:model="category_id">
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>


                        </div>
                    </div>

                </article>
            </div>
        </div>
    </section>
</div>
