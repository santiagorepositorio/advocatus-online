<section class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden mt-8">
    <h1 class="text-center text-3xl text-gray-600">Blogs Recientes</h1>
        <p class="text-center text-gray-500 text-sm mb-6"></p>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">        
        @forelse ($posts as $post)
            <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                style="background-image: url({{ Storage::url($post->image->url) }})">
                <div class="w-full h-full px-8 flex flex-col justify-center -mt-4">
                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="" class=" inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <h1 class="text-xl md:text-2xl lg:text-4xl text-white leading-8 font-bold">
                        <a href="{{ route('blogs.show' ,$post) }}">
                            {{ $post->name }}
                        </a>

                    </h1>

                </div>
            </article>
        @empty

        @endforelse
    </div>

</section>
