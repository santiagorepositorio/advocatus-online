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
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Lo que obtendras</h1>
                    <ul class="gid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2">
                                    {{ $goal->name }}</i></li>
                        @endforeach
                    </ul>
                </div>

            </section>
            <section class="mb-12">
                <h1 class="font-fold text-3xl mb-2">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow-lg rounded-lg" @if ($loop->first) x-data="{ open: true}" @else x-data="{ open: false}" @endif>
                        <div class="border-2 border-blue-500 rounded-lg dark:border-white-700">
                            <button class="flex items-center justify-between w-full p-4" x-on:click="open = !open">
                                <h1 class="font-semibold text-gray-700 dark:text-white">{{ $section->name }}</h1>
        
                                <span class="text-white bg-blue-500 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                            {{-- <header class="border border-blue-200 px-4 py-2 cursor-pointer bg-gray-200 justify-between" x-on:click="open = !open">
                                <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>  
                                                
                            </header> --}}
                       
                        
                        <div class="bg-white py-2 px-4 rounded-lg" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"> <i
                                            class="fas fa-play-circle mr-2 text-gray-600"></i> {{ $lesson->name }}</li>
                                @endforeach

                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion</h1>

                <div>
                    {!! $course->description !!}
                </div>
            </section>
            <div class="card mt-2 p-6">
            @livewire('courses-reviews', ['course' => $course])
            </div>

        </div>
        <div class="order-1 lg:order-2">
            {{-- <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a href=""
                                class="text-blue-400 text-sm font-bold">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>
                    @can('enrolled', $course)
                        <a class="block text-center w-full mt-4 bg-red-700 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                            href="{{ route('courses.status', $course) }}">CONTINUAR</a>
                    @else
                        @if ($course->price->value == 0)
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">Gratis</p>
                            <form action="{{ route('courses.enrolled', $course) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="block text-center w-full mt-4 bg-red-700 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    INSCRIBIRSE
                                </button>
                            </form>
                        @else
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                            <button class="btn btn-primary w-full mb-2" wire:click="add_to_cart"
                                wire:loading.attr="disabled" wire:target="add_to_cart">
                                @if (Cart::instance('shopping')->content()->where('id', $this->course->id)->first())
                                    Eliminar del carrito
                                @else
                                    Añadir al carrito
                                @endif
                            </button>
                            <a href="{{ route('payment.checkout', $course) }}"
                                class="block text-center w-full mt-4 bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">Comprar
                                este Curso</a>
                        @endif
                    @endcan

                </div>
            </section> --}}
            <div class="mb-4">
                @livewire('courses-enrolled', compact('course'), key('enrolled' . $course->id))
            </div>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}"
                            alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3"
                                    href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>
                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{ $similar->rating }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
            
        </div>
    </div>
</x-app-layout>
