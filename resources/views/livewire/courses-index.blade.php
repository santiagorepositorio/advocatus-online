<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap lg:justify-center">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 mb-3 sm:mb-0" wire:click="resetFilters">
                <i class="fas fa-window-maximize text-xs mr-2"></i>
                <span class="hidden sm:inline">Todos los cursos</span>
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
            <div class="relative mr-4 mb-3 sm:mb-0">
                <select wire:model="level_id"
                    class="block appearance-none h-12 px-4 rounded-lg bg-white border border-gray-300 text-gray-700 overflow-hidden focus:outline-none shadow w-full sm:w-64"
                    id="select-level">
                    <option value="">Seleccione Niveles</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <section class="mt-12">
        <div
            class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
    <section class="mt-4 mr-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">{{ $courses->links() }}</div>
    </section>
    <section class="mt-4 mr-4"></section>
</div>
