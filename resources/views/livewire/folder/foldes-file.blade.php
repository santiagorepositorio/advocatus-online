<div>
    <div class="bg-gray-200 py-2 mb-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap lg:justify-center">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 mb-3 sm:mb-0" wire:click="resetFilters">
                <i class="fas fa-window-maximize text-xs mr-2"></i>
                <span class="hidden sm:inline">Todas las Categorias</span>
                <span class="sm:hidden">Todos</span>
            </button>
            <div class="relative mr-4 mb-3 sm:mb-0">
                <select wire:model="category_id"
                    class="block appearance-none h-12 px-4 rounded-lg bg-white border border-gray-300 text-gray-700 overflow-hidden focus:outline-none shadow w-full sm:w-64"
                    x-on:change="open = false">
                    <option value="">Seleccione Categorías</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>            
        </div>
    </div>
    <section class="">
        <div class="container px-6 py-2 mx-auto">

            <div class="grid grid-cols-1 gap-8 mt-2 xl:mt-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                @forelse ($folders as $folder)
                <a href="{{ route('folders.show', $folder) }}" class="flex flex-col p-0 cursor-pointer">
                    <img class="object-cover w-32 h-32 transition-all hover:-translate-y-2 duration-300 " src="{{ asset('assets/imgs/icons8-carpeta-144.png') }}" alt="">
                    <p class="mt-0 text-gray-500 capitalize ">{{ $folder->category->name }}</p>
                    <h1 class="mt-0 text-xl font-semibold text-gray-700 capitalize ">{{ $folder->name }}</h1>
                </a>                
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="mt-4 mr-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">{{ $folders->links() }}</div>
    </section>

</div>
