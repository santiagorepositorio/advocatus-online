<x-app-layout>
<section class="bg-gray-700 py-2 mb-2">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 py-2 mb-2">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-2">
                <div class="px-6 py-4">
                  
                    {{-- <iframe id="documentoFrame" src="{{ route('word.to.pdf', $item->resource->id) }}" frameborder="0" class="w-full h-screen"></iframe> --}}

                    <iframe id="documentoFrame" src="{{ Storage::url($item->resource->url) }}" frameborder="0"
                        style="width: 100%; height: 800px;" onload="ajustarTamaño(this);"></iframe>
                </div>    
            </section>  
        </div>
        <div class="order-1 lg:order-2">
    
            <div class="mb-4">
                <section class="card">
                    <div class="card-body">
                        <div class="flex items-center">
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $item->folder->user->profile_photo_url }}"
                                alt="{{ $item->folder->user->name }}">
                            <div class="ml-4">
                                <h1 class="font-bold text-gray-500 text-lg">
                                    By: {{ $item->folder->user->name }}
                                </h1>
                                <a class="text-blue-400 text-sm font-bold"
                                    href="">{{ '@' . Str::slug($item->folder->user->name, '') }}</a>
                            </div>
                        </div>
           
                            <div class="mt-4 flex items-center justify-between ">
                                <a class="btn btn-danger btn-block w-80 mb-2" href="{{ route('folder.download', $item) }}">DESCARGAR</a>
         
                            </div>       
                
                    </div>
                </section>
            </div>       
            
        </div>
    </div>

</section>

</x-app-layout>