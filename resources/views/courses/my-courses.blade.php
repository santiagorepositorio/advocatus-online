<x-app-layout>
    <div class="container px-6 mt-12">

        <h1 class="text-2xl font-semibold mb-4">Mis cursos matriculados</h1>

        @if ($courses->count())
            
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($courses as $course)
                    
                    <li class="overflow-hidden">
                        <a class="block" href="{{ route('courses.status', $course) }}">
                            
                            <figure class="aspect-w-16 aspect-h-9">
                                <img src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}" class="rounded-lg object-cover object-center">
                            </figure>
                            
                            <h2 class="mt-1 truncate">{{Str::limit($course->title, 45)}}</h2>

                        </a>
                    </li>

                @endforeach

            </ul>

            @if ($courses->hasPages())
            
                <div class="mt-8">
                    {{ $courses->links() }}
                </div>
                
            @endif
            

        @else
            
            <div class="card">
                <div class="card-body">
                
                    <figure>
                        <img class="w-64 mx-auto" src="https://cdn.pixabay.com/photo/2015/11/03/09/03/question-mark-1019993_960_720.jpg" alt="">
                    </figure>
                    
                    <p class="my-2 text-center">Parece que no estás matriculado en ningún curso</p>

                    <div class="flex justify-center pb-4">
                        <a class="btn btn-primary" href="{{route('courses.index')}}">
                            Comprar un curso
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>