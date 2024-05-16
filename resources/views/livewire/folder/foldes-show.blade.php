<div class="container py-8">

    <x-table-responsive>
      <div class="px-6 py-4 flex items-center justify-center bg-gray-200">
        <h2 class="text-2xl font-semibold text-gray-800">CARPETA DE: {{ $folder->category->name }}</h2>
    </div>
    
        @if ($folder->files->count())
            <table class="min-w-full divide-y divide-y-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titulo</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($folder->files as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full object-cover object-center" src="{{ asset('assets/imgs/' . pathinfo($item->resource->url, PATHINFO_EXTENSION) . '_icon.png') }}" alt="PDF Icon">                                  
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ basename($item->resource->url) }}</div>
                                    <div class="text-gray-400">{{ $item->name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                       
                                <div class="flex justify-center gap-12">

                                    @if (!is_null($item->resource) && !is_null($item->resource->url))
                                        <p class="cursor-pointer" wire:click="download({{ $item }})">
                                            <i wire:click="download({{ $item }})"
                                                class="fas fa-download fa-lg text-gray-600 mr-2"></i>
                                        </p>
                                        <p class="cursor-pointer" wire:click="ver({{ $item }})">
                                            <i class="fas fa-eye fa-lg text-gray-600 mr-2"></i>
                                        </p>
                                    @else
                                    @endif


                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay archivos
            </div>

        @endif
        {{-- <div class="px-6 py-4">
          {{ $folder->links() }}
      </div> --}}
    </x-table-responsive>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <x-jet-input wire:model="documento" type="text" class="w-full" />
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <iframe id="documentoFrame" src="{{ Storage::url($documento) }}" frameborder="0"
                    style="width: 100%; height: 600px;" onload="ajustarTamaño(this);"></iframe>
            </div>
        </x-slot>
        <x-slot name="footer">
            VER DOCUMENTO
        </x-slot>
    </x-jet-dialog-modal>
</div>
