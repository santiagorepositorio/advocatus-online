<div class="container py-8">

    <x-table-responsive>

        {{-- <div class="px-6 py-4 flex">
          <input wire:model="search" type="text" class="form-input flex-1 w-full rounded-lg shadow-sm"
              placeholder="Ingrese un dato">
          <a class="btn btn-danger ml-2" href="{{ route('instructor.courses.create') }}">Crear Curso</a>
      </div> --}}
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
                                    {{-- <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/pdf_icono.png') }}" alt="PDF Icon"> --}}
                                    @switch(pathinfo($item->resource->url, PATHINFO_EXTENSION))
                                        @case('png')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/png_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('jpeg')
                                        @case('jpg')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/jpg_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('pdf')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/pdf_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('txt')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/txt_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('svg')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/svg_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('rar')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/rar_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('zip')
                                            <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/zip_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('docx')
                                        @case('doc')
                                        <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/doc_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('xlsx')
                                        @case('xls')
                                        <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/xls_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @case('pptx')
                                        @case('ppt')
                                        <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/ppt_icon.png') }}" alt="PDF Icon">
                                        @break
                                        @default
                                        <img class="h-full w-full  object-cover object-center" src="{{ asset('assets/imgs/no_icon.png') }}" alt="PDF Icon">
                                    @endswitch
                                    {{-- <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span> --}}
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ basename($item->resource->url) }}</div>
                                    <div class="text-gray-400">{{ $item->name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{-- <iframe  src="{{ Storage::url($item->resource->url) }}" frameborder="0"></iframe> --}}
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
            VER DOCUMENTO
            <x-jet-input wire:model="documento" type="text" class="w-full" />
            {{-- <p class="text-sm">Plataforma: {{ strval($documento) }}</p> --}}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <iframe id="documentoFrame" src="{{ Storage::url($documento) }}" frameborder="0"
                    style="width: 100%; height: 600px;" onload="ajustarTamaño(this);"></iframe>

            </div>
        </x-slot>
        <x-slot name="footer">
            VER DOCUMENTO
            sdsv
        </x-slot>
    </x-jet-dialog-modal>
</div>
