<x-app-layout>
    <section class="bg-gray-700 py-12 mb-8">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @isset($course->image)
                    <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img class="h-60 w-full object-cover"
                        src="{{asset('img/home/imagen-no-disponible.png') }}"
                        alt="">
                @endisset
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-th-list"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p class="mb-2"><i class="fas fa-star"></i> Calificacion: {{ $course->rating }}</p>
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
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderasa</h1>
                    <ul class="gid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2">
                                    {{ $goal->name }}</i></li>

                        @empty
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2">Este curso
                                    aun no tienes asignado alguna meta</i></li>
                        @endforelse
                    </ul>
                </div>

            </section>
            <section class="mb-12">
                <h1 class="font-fold text-3xl mb-2">Temario</h1>

                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data="{ open: true}"
                        @else
                        x-data="{ open: false}" @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"
                            x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>

                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"> <i
                                            class="fas fa-play-circle mr-2 text-gray-600"></i> {{ $lesson->name }}</li>
                                @endforeach


                            </ul>
                        </div>
                    </article>
                @empty
                    <li class="text-gray-700 text-base">NO TIENE UN TEMARIO ASIGNADO</li>
                @endforelse
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">

                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                        <li class="text-gray-700 text-base">NO TIENE REQUISITOS AUN</li>
                    @endforelse
                </ul>
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion</h1>

                <div>
                    @if ($course->description)
                        {!! $course->description !!}
                    @else
                        <ul class="list-disc list-inside">
                            <li class="text-gray-700 text-base">NO TIENE DESCRIPCION AUN</li>
                        </ul>
                    @endif

                </div>
            </section>

        </div>
        <div class="order-1 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a href=""
                                class="text-blue-400 text-sm font-bold">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    <div class="flex justify-center mb-4">
                        {{-- <form action="{{ route('admin.courses.approved', $course) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary py-2 px-4 rounded mr-2">
                                OBSERVAR CURSO
                            </button>
                        </form>  --}}
                        <a class="btn btn-danger" href="{{ route('admin.courses.observation', $course) }}">Observar</a>

                    </div>
                    <div class="flex justify-center ">
                        <form action="{{ route('admin.courses.approved', $course) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary py-2 px-4 rounded mr-2">
                                APROBAR CURSO
                            </button>
                        </form>
                        <a class="btn btn-danger" href="{{ route('admin.courses.index') }}">Cancelar</a>

                    </div>


                </div>
            </section>

        </div>
    </div>
</x-app-layout>
