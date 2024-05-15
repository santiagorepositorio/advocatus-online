<div>
    <section class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden mt-8">
        <h1 class="text-center text-3xl text-gray-600">CARPETAS DE : {{ auth()->user()->name }} </h1>
        <hr class="mt-2 mb-6">
        {{-- <p class="text-center text-gray-500 text-sm mb-6"></p> --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($folders as $folder1)
                <article class="card mb-4 border-black" x-data="{ open: true }">
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
                                    <select
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                                        wire:model="folder.category_id">
                                        <option value="">Seleccione Categoria</option>
                                        @foreach ($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('folder.category_id')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror

                                </div>

                            </form>
                        @else
                        <h1 x-on:click="open = !open" class="cursor-pointer font-bold text-center text-xl text-blue-700 mb-2">{{ $folder1->name }}</h1>
                            <header class="flex justify-between items-center">
                                {{-- fa-sort-amount-{{ open = true ? 'down' : 'up' }} --}}
                                <i class="fas mr-2" :class="open ? 'fa-sort-amount-up' : 'fa-sort-amount-down'"></i>
                                <div class="">
                                    
                                    <i class="fas fa-edit cursor-pointer text-blue-500 mr-2"
                                        wire:click="edit({{ $folder1 }})"> Editar</i>
                                    <i class="fas fa-eraser cursor-pointer text-red-500 mr-2"
                                        wire:click="destroy({{ $folder1 }})"> Eliminar</i>


                                    @if ($folder1->status == 1)
                                    <i class="fas fa-low-vision cursor-pointer text-black" wire:click="privado({{ $folder1 }})"> Borrador</i>                                       
                                    @elseif ($folder1->status == 2)
                                        <i class="fas fa-eye-slash cursor-pointer  text-red-500"  wire:click="publico({{ $folder1 }})"> Privado</i>
                                    @elseif ($folder1->status == 3)
                                        <i class="fas fa-eye-slash cursor-pointer text-green-500"
                                            wire:click="borrador({{ $folder1 }})"> Público</i>                                   
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
                            <select
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                                wire:model="category_id">
                                <option value="">Seleccione Categoria</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-sm text-red-500">Debe Seleccionar una Categoria</span>
                            @enderror

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
