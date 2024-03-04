<x-app-layout>
    <section class="bg-gray-700 py-12 mb-8">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @isset($course->image)
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                <img class="h-60 w-full object-cover" src="{{ asset('img/home/imagen-no-disponible.png') }}" alt="">
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

        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderasa</h1>
                    <ul class="gid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                        <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"> {{ $goal->name }}</i></li>
                                                  
                        @empty
                        <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2">Este curso aun no tienes asignado alguna meta</i></li>
                        @endforelse
                    </ul>
                </div>

            </section>
          

        </div>
        <div class="order-1 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">{{ $user->name }}</h1>
                            <a href="" class="text-blue-400 text-sm font-bold">Estudiante</a>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mb-4">

                        <a class="btn btn-primary py-2 px-4 rounded mr-2" href="{{ route('home', $course) }}">CERRAR</a>
                        
                    </div>
                   
                    
                </div>
            </section>
            
        </div>
    </div>
</x-app-layout>