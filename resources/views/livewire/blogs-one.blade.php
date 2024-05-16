<section class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden mt-8">
    <h1 class="text-center text-3xl text-gray-600">Ultimos 5 Artículos Publicados</h1>
    <p class="text-center text-gray-500 text-sm mb-6"></p>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

        @forelse ($posts as $post) 
        
                <article class=" cursor-pointer w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url({{ $post->image }})"><a href="{{ route('posts.show', $post) }}">
                    <div class="w-full h-full px-8 flex flex-col justify-end -mt-4">
                        @foreach ($post->tags as $tag)
                            <a href="#">
                                <span
                                    class="bg-{{ $tag->color }}-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                    {{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                        <h1 class="text-xl md:text-2xl lg:text-4xl text-white leading-8 font-bold">

                            {{ $post->title }}

                        </h1>
                    </div></a>
                </article>
            
        @empty

        @endforelse
    </div>

</section>
