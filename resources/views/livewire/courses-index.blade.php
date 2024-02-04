<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class=" focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fas fa-window-maximize text-xs mr-2"></i>Todos los cursos
            </button>

            <div class="relative mr-4" x-data="{ open: false }">
                <button type="button"
                    class="text-gray-700 block h-12 px-4 rounded-lg bg-white overflow-hidden focus:outline-none shadow"
                    aria-expanded="false" x-on:click="open=true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    <span>Categorias</span>
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                <div x-show="open" x-on:click.away="open = false"
                    class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl z-auto">
                    @foreach ($categories as $category)
                    <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">
                        {{ $category->name }}
                    </a>                   
                    @endforeach             
                </div>
            </div>

            <div class="relative" x-data="{ open: false }">
                <button type="button"
                    class="text-gray-700 group h-12 px-4 inline-flex items-center rounded-lg bg-white shadow text-base font-medium hover:text-gray-900"
                    aria-expanded="false" x-on:click="open=!open">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    <span>Niveles</span>
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                <div x-show="open" x-on:click.away="open = false"
                    class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                    @foreach ($levels as $level)
                    <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">
                        {{ $level->name }}
                    </a>
                  
                    @endforeach
                </div>
            </div>
        </div>

    </div>
   
    <section class="mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course )
            <x-course-card :course="$course" />            
        @endforeach
    </div>
    </section>
    <section class="mt-4 mr-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">{{ $courses->links() }}</div>
    </section>
    <section class="mt-4 mr-4"></section>


</div>
