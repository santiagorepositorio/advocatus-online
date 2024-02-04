<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open =!open" class=" cursor-pointer">Descripcion</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                <form wire:submit.prevent="update">
                    <textarea wire:model="description.name" class="form-input w-full"></textarea>
                    @error('description.name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end my-2">
                        <button class="btn btn-danger text-sm" wire:click="destroy" type="button">Eliminar</button>
                        <button class="btn btn-primary text-sm ml-2" type="submit">Actualizar</button>
                    </div>
                </form> 
                @else
                <div>
                    <textarea wire:model="name" class="form-input w-full" placeholder="Agregue una descripcion de la leccion"></textarea>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end my-2">
                        <button class="btn btn-danger text-sm" wire:click="store" type="button">guardar</button>
                        
                    </div>
                </div>                   
                @endif
            </div>
        </div>
    </article>
</div>
