<x-app-layout>
    <section class="bg-cover mb-8" style="background-image: url({{ asset('img/home/4884273.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Artículos Profesionales</h1>
                <p class="text-white text-lg mt-2">Nuevos en las distintas áreas</p>
                @livewire('search-post')
            </div>
        </div>
    </section>
    {{-- @livewire('blogs-index') --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <div class="col-span-1 lg:col-span-3">
                <div>
                    @forelse ($posts as $post)
                        <article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">

                            <figure>
                                <a href="{{ route('posts.show', $post) }}">
                                    <img class="aspect-[16/9] object-cover object-center w-full rounded-md"
                                        src="{{ $post->image }}" alt="" id="imgPreview">
                                </a>
                            </figure>

                            <div>

                                <h1 class="text-xl font-semibold">
                                    <a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 40) }}</a>
                                </h1>
                                <hr class="my-1">

                                <div class="mb-2">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('posts.index') . '?tag=' . $tag->name }}">
                                            <span
                                                class="bg-{!! $tag->color !!}-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                                {{ $tag->name }}
                                            </span>
                                        </a>
                                    @endforeach

                                </div>

                                <div class="flex items-center mb-2">

                                    <a href="" class="flex items-center">
                                        <figure class="mr-2">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ $post->user->profile_photo_url }}" alt="">
                                        </figure>

                                        <p class="text-sm mr-2">{{ $post->user->name }}</p>
                                    </a>

                                    <p class="text-sm ">
                                        - {{ date('d M Y', strtotime($post->published_at)) }}

                                    </p>
                                </div>

                                <p>{{ Str::limit($post->excerpt, 200) }}</p>


                                <div class="mt-4 flex justify-between items-center">

                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Leer
                                        más</a>

                                    <span class="flex items-center">
                                        <i class="far fa-comment-alt mr-2"></i>
                                        {{ $post->questions()->count() }}
                                    </span>
                                </div>
                            </div>

                        </article>
                    @empty

                    @endforelse

                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center justify-between gap-10">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="col-span-1">
                <form class="mb-4">
                    <div class="mb-4">
                        <p class="font-semibold text-lg">Ordenar:</p>
                        <select name="order"
                            class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="new" @selected(request('order') == 'new')>Más Nuevos</option>
                            <option value="old" @selected(request('order') == 'old')>Más Antiguos</option>

                        </select>
                    </div>
                    <hr>
                    <div class="mb-2">
                        <p class="font-semibold text-lg">Categorias:</p>
                        <ul>
                            @forelse ($categories as $category)
                                <li>
                                    <label>
                                        <x-jet-checkbox name="category[]" value="{{ $category->id }}"
                                            :checked="in_array($category->id, request('category') ?? [])" />
                                        <span class="ml-2 text-gray-700">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <x-jet-button>Aplicar Filtro</x-jet-button>

                </form>
                <hr>
                <aside class=" hidden lg:block">
                    <h1 class="text-2xl font-semibold mb-6">Artículos populares</h1>


                    <div class="space-y-4">
                        <aside class="hidden lg:block">
                            @foreach ($populares as $popular)
                                <article class="grid grid-cols-2 gap-2 mb-4">
                                    <img class="aspect-[16/9] object-cover object-center" src="{{ $popular->image }}"
                                        alt="">
                                    <div class="ml-3">
                                        <h1>
                                            <a class="text-sm font-semibold text-gray-500 mb-3"
                                                href="{{ route('posts.show', $popular) }}">{{ Str::limit($popular->title, 30) }}</a>
                                        </h1>
                                    </div>
                                </article>
                            @endforeach
                        </aside>

                    </div>

                </aside>

            </div>
        </div>
    </div>
</x-app-layout>
