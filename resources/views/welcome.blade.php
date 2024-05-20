<x-app-layout>
    @livewire('banner-index')
    @livewire('profiles-one')
    <section class="mt-4 p-4">
        <h1 class="text-center text-3xl text-gray-600">CURSOS MAS VENDIDOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6"></p>
        <div class="container mx-auto grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($topSubscribedCourses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>

    </section>


    <!-- Banner de Publicidad -->
    <section class="py-10">

        <div class="swiper2 mySwiper2">
            <div class="swiper-wrapper">
                @forelse ($publicities as $publicity)
                    <div class="swiper-slide">
                        <div class="bg-cover bg-center text-white lg:py-24 lg:px-10 object-fill"
                            style="background-image: url({{ Storage::url($publicity->image->url) }})">
                            <div class="mx-auto max-w-7xl"><br>
                                <p class="font-bold text-sm uppercase">Publicidad</p>
                                <p class="lg:text-3xl font-bold">{{ $publicity->title }}</p>
                                <br>
                                <a href="{{ $publicity->link }}"
                                    class="bg-purple-800 sm:py-3 sm:px-4 lg:py-4 lg:px-8 text-white font-bold uppercase sm:text-sm lg:text-xs rounded hover:bg-gray-200 hover:text-gray-800">Ver
                                    Detalles</a>
                            </div>
                        </div>
                        <div class="bg-slate-500 items-center">
                            <p class="text-white sm:text-xs lg:text-2xl mb-10 leading-none text-center">
                                {{ $publicity->description }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    @livewire('blogs-one')


    <!-- Banner de APK ANDROID -->
    <section class="bg-white  mt-8">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto xl:flex-row">
            <div class="flex justify-center xl:w-1/2">
                <img class="h-80 w-80 sm:w-[28rem] sm:h-[28rem] flex-shrink-0 object-cover rounded-full"
                    src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80"
                    alt="">
            </div>

            <div class="flex flex-col items-center mt-6 xl:items-start xl:w-1/2 xl:mt-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-800 xl:text-4xl ">
                    Descarga nuestra aplicación móvil gratuita
                </h2>

                <p class="block max-w-2xl mt-4 text-xl text-gray-500 ">Accede desde cualquier parte,
                    como Abogado forma parte del MarketPlace Juridico</p>

                <div class="mt-6 sm:-mx-2">
                    <div class="inline-flex w-full overflow-hidden rounded-lg shadow sm:w-auto sm:mx-2">
                        <a href="#"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-600 sm:w-auto">
                            <svg class="w-6 h-6 mx-2 fill-current" xmlns:xlink="" x="0px" y="0px" viewBox="0 0 512 512"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M407,0H105C47.103,0,0,47.103,0,105v302c0,57.897,47.103,105,105,105h302c57.897,0,105-47.103,105-105V105
                                        C512,47.103,464.897,0,407,0z M482,407c0,41.355-33.645,75-75,75H105c-41.355,0-75-33.645-75-75V105c0-41.355,33.645-75,75-75h302
                                        c41.355,0,75,33.645,75,75V407z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M305.646,123.531c-1.729-6.45-5.865-11.842-11.648-15.18c-11.936-6.892-27.256-2.789-34.15,9.151L256,124.166
                                        l-3.848-6.665c-6.893-11.937-22.212-16.042-34.15-9.151h-0.001c-11.938,6.893-16.042,22.212-9.15,34.151l18.281,31.664
                                        L159.678,291H110.5c-13.785,0-25,11.215-25,25c0,13.785,11.215,25,25,25h189.86l-28.868-50h-54.079l85.735-148.498
                                        C306.487,136.719,307.375,129.981,305.646,123.531z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M401.5,291h-49.178l-55.907-96.834l-28.867,50l86.804,150.348c3.339,5.784,8.729,9.921,15.181,11.65
                                        c2.154,0.577,4.339,0.863,6.511,0.863c4.332,0,8.608-1.136,12.461-3.361c11.938-6.893,16.042-22.213,9.149-34.15L381.189,341
                                        H401.5c13.785,0,25-11.215,25-25C426.5,302.215,415.285,291,401.5,291z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M119.264,361l-4.917,8.516c-6.892,11.938-2.787,27.258,9.151,34.15c3.927,2.267,8.219,3.345,12.458,3.344
                                        c8.646,0,17.067-4.484,21.693-12.495L176.999,361H119.264z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="mx-2">
                                Consíguelo en la App Store
                            </span>
                        </a>
                    </div>

                    <div class="inline-flex w-full mt-4 overflow-hidden rounded-lg shadow sm:w-auto sm:mx-2 sm:mt-0">
                        <a href="#"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white transition-colors duration-150 transform sm:w-auto bg-gradient-to-r from-blue-700 to-blue-900 hover:from-blue-600 hover:to-blue-600">
                            <svg class="w-6 h-6 mx-2 fill-current" viewBox="-28 0 512 512.00075"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m432.320312 215.121094-361.515624-208.722656c-14.777344-8.53125-32.421876-8.53125-47.203126 0-.121093.070312-.230468.148437-.351562.21875-.210938.125-.421875.253906-.628906.390624-14.175782 8.636719-22.621094 23.59375-22.621094 40.269532v417.445312c0 17.066406 8.824219 32.347656 23.601562 40.878906 7.390626 4.265626 15.496094 6.398438 23.601563 6.398438s16.214844-2.132812 23.601563-6.398438l361.519531-208.722656c14.777343-8.53125 23.601562-23.8125 23.601562-40.878906s-8.824219-32.347656-23.605469-40.878906zm-401.941406 253.152344c-.21875-1.097657-.351562-2.273438-.351562-3.550782v-417.445312c0-2.246094.378906-4.203125.984375-5.90625l204.324219 213.121094zm43.824219-425.242188 234.21875 135.226562-52.285156 54.539063zm-6.480469 429.679688 188.410156-196.527344 54.152344 56.484375zm349.585938-201.835938-80.25 46.332031-60.125-62.714843 58.261718-60.773438 82.113282 47.40625c7.75 4.476562 8.589844 11.894531 8.589844 14.875s-.839844 10.398438-8.589844 14.875zm0 0">
                                </path>
                            </svg>
                            <span class="mx-2">Consiguelo en Google Play</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-12 ">
        <h1 class="text-gray-600 text-center text-3xl mb-6">
            CONTENIDO
        </h1>
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/juridica.jpeg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos</h1>
                </header>

            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/licenciada.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Guía de Contactos de Aogados</h1>
                </header>

            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/tecnologia.webp') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Libros de Investigación</h1>
                </header>

            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/tecnologia.webp') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Memoriales para Abogados</h1>
                </header>

            </article>


        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Si tienes Hijos con Trastorno del Espectro Autista!</h1>
        <p class="text-center text-white">Revisa el Material Digital en Psicopedagoía y/o Busca un Centro en la Ciudad
            que vives para terapias o Escuelas donde aceptan Alumnos con TEA</p>
        <div class="flex justify-center mt-4 gap-6">
            <a href="{{ route('folders.index') }}"
                class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
                Material Digital
            </a>
            <a href="{{ route('outlet_map.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Centros Inclusivos
            </a>

        </div>
    </section>

    <section>
        <div class="min-h-screen bg-gray-100 p-3 relative hidden">
            <div class="w-96 mx-auto" style="scroll-snap-type: x mandatory;">
                <!-- first -->
                <div class="">
                    <input class="sr-only peer" type="radio" name="carousel" id="carousel-1" checked />
                    <!-- content #1 -->
                    <div
                        class="w-96 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                        <img class="rounded-t-lg w-96 h-64"
                            src="https://images.unsplash.com/photo-1628788835388-415ee2fa9576?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=384&q=80"
                            alt="" />
                        <div class="py-4 px-8">
                            <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">
                                Lorem
                                ipsum dolor sit amet consectetur adipisicing.
                            </h1>
                            <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- controls -->
                        <div class="absolute top-1/2 w-full flex justify-between z-20">
                            <label for="carousel-3"
                                class="inline-block text-red-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                            <label for="carousel-2"
                                class="inline-block text-red-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- second -->
                <div class="">
                    <input class="sr-only peer" type="radio" name="carousel" id="carousel-1" />
                    <!-- content #2 -->
                    <div
                        class="w-96 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                        <img class="rounded-t-lg w-96 h-64"
                            src="https://images.unsplash.com/photo-1628191139360-4083564d03fd?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=384&q=80"
                            alt="" />
                        <div class="py-4 px-8">
                            <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">
                                Scelerisque eleifend donec pretium vulputate sapien.
                            </h1>
                            <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">Egestas diam in arcu cursus
                                euismod
                                quis. Fusce id velit ut tortor. Congue quisque egestas diam in arcu cursus euismod quis.
                            </p>
                        </div>
                        <!-- controls -->
                        <div class="absolute top-1/2 w-full flex justify-between z-20">
                            <label for="carousel-1"
                                class="inline-block text-blue-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                            <label for="carousel-3"
                                class="inline-block text-blue-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- three -->
                <div class="">
                    <input class="sr-only peer" type="radio" name="carousel" id="carousel-3" />
                    <!-- content #3 -->
                    <div
                        class="w-96 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                        <img class="rounded-t-lg w-96 h-64"
                            src="https://images.unsplash.com/photo-1628718120482-07e03fe361dd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=384&q=80"
                            alt="" />
                        <div class="py-4 px-8">
                            <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">
                                Consectetur purus ut faucibus pulvinar elementum.
                            </h1>
                            <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">Aliquam ultrices sagittis
                                orci a
                                scelerisque purus semper. Quisque id diam vel quam elementum pulvinar. Facilisis magna
                                etiam
                                tempor orci eu lobortis elementum.
                            </p>
                        </div>
                        <!-- controls -->
                        <div class="absolute top-1/2 w-full flex justify-between z-20">
                            <label for="carousel-2"
                                class="inline-block text-yellow-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                            <label for="carousel-1"
                                class="inline-block text-yellow-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>
    @push('glider')           <!-- Initialize Swiper -->
        <script>
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>
    @endpush
</x-app-layout>
