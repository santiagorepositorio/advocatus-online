<div>
    <div class="card-body bg-gray-100">        
      
            @if ($archivo->resource)
                <div class="">
                    <p class="cursor-pointer" wire:click="download"><i wire:click="download" class="fas fa-download text-gray-600 mr-2"></i>
                        {{ $archivo->resource->url }}
                    </p>                    
                    <div class=" gap-3">
                        <i class="fas fa-trash text-red-500 cursor-pointer" wire:click="destroy">Eliminar</i>
                    <i class="fa fa-eye text-blue-500 cursor-pointer" wire:click="destroy">Ver</i>
                    </div>
                </div>
            @else
            <form wire:submit.prevent="save">
                <div class="flex items-center">
                    <input wire:model="file" type="file" class="form-input flex-1">
                    <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                </div>
                <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">Cargando...</div>
                @error('file')
                            <span class="text-xs text-red-500"> {{ $message }}</span>
                        @enderror
            </form>
            @endif
       

    </div>
</div>
