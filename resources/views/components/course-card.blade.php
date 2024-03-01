@props(['course'])

<article class="card flex flex-col p-1 transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg">
    @isset($course->image)
    <img class="h-36 w-full object-cover rounded-lg" src="{{ Storage::url($course->image->url) }}" alt="">
    @else
    <img class="h-36 w-full object-cover" src="{{asset('img/home/imagen-no-disponible.png') }}" alt="">       
    @endisset
    

    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $course->rating}}</span>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>
        @if ($course->price->value == 0)
        <p class="my-2 font-bold text-green-900">Gratis</p>
        @else
            <p class="my-2 font-bold text-gray-500">Bs. {{ $course->price->value }}</p>
        @endif
        <a href="{{ route('courses.show', $course) }}" class="btn btn-primary btn-block">
            Mas Detalles
        </a>
       
    </div>
</article>
