<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

        <section class="col-span-1 lg:col-span-3">


            <form id="form-search" action="" class="mb-8">

                <div class="flex">
                    

                    <select name="category_id" id=""
                        class="flex-shrink-0 py-2.5 text-sm font-semibold text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        <option value="all" selected="">Todas las categorias</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <div class="relative w-full" x-data="{ search: 'web' }">
                        <input type="search" x-bind:name="search ? 'search' : ''" id="search"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 ui-autocomplete-input"
                            x-model="search" placeholder="¿Estás buscando algún artículo?" autocomplete="off"
                            name="search">

                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>

                </div>

            </form>



            <div>
                @forelse ($posts as $post)
                <article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">

                    <figure>
                        <a href="{{ route('posts.show' ,$post) }}">
                            <img class="aspect-[16/9] object-cover object-center w-full rounded-md" src="{{ $post->image }}" alt=""
                            id="imgPreview">
                        </a>
                    </figure>
                   
                    <div>

                        <h1 class="text-xl font-semibold">
                            <a href="{{ route('posts.show' ,$post) }}">{{ Str::limit($post->title, 40) }}</a>
                        </h1>
                        <hr class="my-1">

                        <div class="mb-2">
                            @foreach ($post->tags as $tag)
                            
                            <a href="https://codersfree.com/posts?tag=diseño web">
                                <span class="bg-{!! $tag->color !!}-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                    {{ $tag->name }}
                                </span>
                            </a>
                            @endforeach
                            {{-- <a href="https://codersfree.com/posts?tag=novedades">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    novedades
                                </span>
                            </a> --}}
                        </div>

                        <div class="flex items-center mb-2">

                            <a href="" class="flex items-center">
                                <figure class="mr-2">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ $post->user->profile_photo_url }}"
                                        alt="">
                                </figure>

                                <p class="text-sm mr-2">{{ $post->user->name }}</p>
                            </a>

                            <p class="text-sm ">
                                - {{date("d M Y", strtotime($post->created_at))}}
                                
                            </p>
                        </div>

                        <p>{{ Str::limit($post->excerpt, 200) }}</p>
                        

                        <div class="mt-4 flex justify-between items-center">
                         
                            <a href="{{ route('posts.show' ,$post) }}" class="btn btn-primary">Leer
                                más</a>

                            <span class="flex items-center">
                                <i class="far fa-comment-alt mr-2"></i>
                                0
                            </span>
                        </div>
                    </div>

                </article>            
                @empty
                    
                @endforelse
                {{-- <article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">

                    <figure>
                        <a href="https://codersfree.com/posts/razones-usar-laravel-aplicacion-web">
                            <img class="aspect-[16/9] w-full object-cover object-center"
                                src="https://codersfree.nyc3.cdn.digitaloceanspaces.com/posts/7-razones-para-usar-laravel-en-tu-proyecto-de-aplicacion-web.jpg"
                                alt="7 razones para usar Laravel en tu proyecto de aplicación web">
                        </a>
                    </figure>

                    <div>

                        <h1 class="text-xl font-semibold">
                            <a href="https://codersfree.com/posts/razones-usar-laravel-aplicacion-web">7 razones para
                                usar Laravel en tu proyecto de aplicación web</a>
                        </h1>
                        <hr class="my-1">

                        <div class="mb-2">
                            <a href="https://codersfree.com/posts?tag=laravel">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    laravel
                                </span>
                            </a>
                        </div>

                        <div class="flex items-center mb-2">

                            <a href="" class="flex items-center">
                                <figure class="mr-2">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="https://ui-avatars.com/api/?name=G&amp;color=7F9CF5&amp;background=EBF4FF"
                                        alt="">
                                </figure>

                                <p class="text-sm mr-2">Guadalupe - </p>
                            </a>

                            <p class="text-sm ">
                                31 Jan 2023
                            </p>
                        </div>

                        <p>En este artículo, te ofrecemos información sobre lo popular y eficiente que es el framework
                            Laravel...</p>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="https://codersfree.com/posts/razones-usar-laravel-aplicacion-web"
                                class="btn btn-blue">Leer más</a>

                            <span class="flex items-center">
                                <i class="far fa-comment-alt mr-2"></i>
                                0
                            </span>
                        </div>
                    </div>

                </article>
                <article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">

                    <figure>
                        <a href="https://codersfree.com/posts/que-hace-un-desarrollador-web">
                            <img class="aspect-[16/9] w-full object-cover object-center"
                                src="https://codersfree.nyc3.cdn.digitaloceanspaces.com/posts/que-hace-un-desarrollador-web.jpg"
                                alt="¿Qué hace un desarrollador web?">
                        </a>
                    </figure>

                    <div>

                        <h1 class="text-xl font-semibold">
                            <a href="https://codersfree.com/posts/que-hace-un-desarrollador-web">¿Qué hace un
                                desarrollador web?</a>
                        </h1>
                        <hr class="my-1">

                        <div class="mb-2">
                            <a href="https://codersfree.com/posts?tag=desarrollador">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    desarrollador
                                </span>
                            </a>
                            <a href="https://codersfree.com/posts?tag=frontend">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    frontend
                                </span>
                            </a>
                            <a href="https://codersfree.com/posts?tag=backend">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    backend
                                </span>
                            </a>
                        </div>

                        <div class="flex items-center mb-2">

                            <a href="" class="flex items-center">
                                <figure class="mr-2">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="https://ui-avatars.com/api/?name=G&amp;color=7F9CF5&amp;background=EBF4FF"
                                        alt="">
                                </figure>

                                <p class="text-sm mr-2">Guadalupe - </p>
                            </a>

                            <p class="text-sm ">
                                13 Dec 2022
                            </p>
                        </div>

                        <p>Los sitios web, las compras en línea y las noticias son posibles gracias a los
                            desarrolladores web....</p>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="https://codersfree.com/posts/que-hace-un-desarrollador-web"
                                class="btn btn-blue">Leer más</a>

                            <span class="flex items-center">
                                <i class="far fa-comment-alt mr-2"></i>
                                0
                            </span>
                        </div>
                    </div>

                </article>
                <article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">

                    <figure>
                        <a href="https://codersfree.com/posts/laravel-websockets-en-forge-con-ssl">
                            <img class="aspect-[16/9] w-full object-cover object-center"
                                src="https://codersfree.nyc3.cdn.digitaloceanspaces.com/posts/laravel-websockets-en-forge-con-ssl.jpg"
                                alt="Laravel WebSockets en Forge con SSL">
                        </a>
                    </figure>

                    <div>

                        <h1 class="text-xl font-semibold">
                            <a href="https://codersfree.com/posts/laravel-websockets-en-forge-con-ssl">Laravel
                                WebSockets en Forge con SSL</a>
                        </h1>
                        <hr class="my-1">

                        <div class="mb-2">
                            <a href="https://codersfree.com/posts?tag=websockets">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    websockets
                                </span>
                            </a>
                            <a href="https://codersfree.com/posts?tag=forge">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    forge
                                </span>
                            </a>
                            <a href="https://codersfree.com/posts?tag=ssl">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                    ssl
                                </span>
                            </a>
                        </div>

                        <div class="flex items-center mb-2">

                            <a href="" class="flex items-center">
                                <figure class="mr-2">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="https://codersfree.nyc3.digitaloceanspaces.com/profile-photos/oNj0Tk9ICmKUOwdRYwJ5NvQBIUXpRqdGq2ebZAR2.jpg"
                                        alt="">
                                </figure>

                                <p class="text-sm mr-2">Victor Arana Flores - </p>
                            </a>

                            <p class="text-sm ">
                                19 Jul 2022
                            </p>
                        </div>

                        <p>Parece que la documentación y o la explicación sobre cómo utilizar Laravel WebSockets en
                            Forge con S...</p>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="https://codersfree.com/posts/laravel-websockets-en-forge-con-ssl"
                                class="btn btn-blue">Leer más</a>

                            <span class="flex items-center">
                                <i class="far fa-comment-alt mr-2"></i>
                                1
                            </span>
                        </div>
                    </div>

                </article> --}}            
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center justify-between gap-10">
                {{ $posts->links() }}
            </div>


        </section>
{{-- SECTOR DE ARTICULOS POPULARES --}}
        <aside class="col-span-1 hidden lg:block">
            <h1 class="text-2xl font-semibold mb-6">Artículos populares</h1>


            <div class="space-y-4">                
                <aside class="hidden lg:block">
                    @foreach ($popuylares as $popuylar)
                        <article class="grid grid-cols-2 gap-2 mb-4">
                            <img class="aspect-[16/9] object-cover object-center" src="{{ $popuylar->image }}"
                                alt="">
                            <div class="ml-3">
                                <h1>
                                    <a class="text-sm font-semibold text-gray-500 mb-3"
                                        href="{{ route('posts.show', $popuylar) }}">{{ Str::limit($popuylar->title, 40) }}</a>
                                </h1>                               
                            </div>
                        </article>
                    @endforeach
                </aside>
              
            </div>

        </aside>

    </div>
</div>
