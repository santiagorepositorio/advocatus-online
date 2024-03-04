<x-app-layout>
    <section class="bg-gray-700 py-8 mb-2">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @isset($course->image)
                    <img class="h-72 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img class="h-72 w-full object-cover"
                        src="{{asset('img/home/imagen-no-disponible.png') }}"
                        alt="">
                @endisset
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <div class="flex items-center mb-4">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                        src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                    <div class="ml-4">
                        <h1 class="font-bold text-gray-white text-lg">Instructor: {{ $course->teacher->name }}</h1>
                        <a href=""
                            class="text-blue-400 text-sm font-bold">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-th-list"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
            </div>

        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        @if (session('info'))
            <div class="lg:col-span-3" x-data="{ open: true }" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ocurrio un Error!</strong>
                    <span class="block sm:inline">{{ session('info') }}.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg x-on:click="open = false" class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        <div class="order-2 lg:col-span-3 lg:order-1">

            <!-- Paletas de Ultimos -->
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">

                <div class="flex justify-center items-center">
                    <!--actual component start-->
                    <div x-data="setup()" class="w-full">
                        <ul class="flex justify-center items-center my-4">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-2 px-4 text-gray-500 lg:border-b-8 lg:mb-0"
                                    :class="activeTab === index ? 'text-blue-500 border-blue-500' : ''"
                                    @click="activeTab = index" x-text="tab"></li>
                            </template>
                        </ul>

                        <div class="h-auto w-auto text-center mx-auto ">
                            <div x-show="activeTab===0">
                                <div class="px-6 py-4">
                                    <h1 class="font-bold text-2xl mb-2">Lista de Alumnos</h1>

                                    {{-- LISTA DE INSCRITOS --}}
                                    @livewire('admin.courses-users-list', ['course' => $course], key('courses-' . $course->id))
                                </div>
                            </div>

                            <div x-show="activeTab===1">
                                <h2 class="text-center text-3xl text-gray-600">Link</h2>
                                @if ($course->certificate->link ?? false)
                                    <p class="text-center text-gray-500 text-sm mb-6">{{ $course->certificate->link }}
                                    </p>
                                @else
                                    <p class="text-center text-gray-500 text-sm mb-6">Aun no tiene asignado un Link</p>
                                @endif

                                <h2 class="text-center text-3xl text-gray-600">Carga Horaria</h2>
                                @if ($course->certificate->description ?? false)
                                    <p class="text-center text-gray-500 text-sm mb-6">
                                        {{ $course->certificate->description }}</p>
                                @else
                                    <p class="text-center text-gray-500 text-sm mb-6">Aun no tiene una carga horaria</p>
                                @endif

                                <h2 class="text-center text-3xl text-gray-600">PLANTILLA de Certificado</h2>
                                @isset($course->certificate->image)
                                    <img name="picture" id="picture" class="w-full h-full object-cover object-center"
                                        src="{{ Storage::url($course->certificate->image->url) }}">
                                @endisset
                            </div>
                        </div>

                        <ul class="flex justify-center items-center my-4">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-3 px-4 rounded transition lg:mb-0"
                                    :class="activeTab === index ? 'bg-blue-500 text-white' : ' text-gray-500'"
                                    @click="activeTab = index" x-text="tab"></li>
                            </template>
                        </ul>

                    </div>
                    <!--actual component end-->
                </div>

                <script>
                    function setup() {
                        return {
                            activeTab: 0,
                            tabs: [
                                "ADMINISTRAR",
    
                                "GRUPO WHATSAPP",
                            ]
                        };
                    };
                </script>

            </section>
        </div>

    </div>
</x-app-layout>
