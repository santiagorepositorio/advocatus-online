<x-app-layout>
<section class="bg-gray-200">
    <div class="h-full  p-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            
                
            

            <div class="w-full h-[250px]">
                <img src="{{ Storage::url($profile->image->url) }}"
                    class=" gl:w-full gl:h-full object-cover object-center rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="{{ $profile->user->profile_photo_url }}"
                    class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{ $profile->name }}</p>
                    <div x-data="{ openSettings: false }" class=" hover:bg-slate-600 rounded">
                        <button @click="openSettings = !openSettings" class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20"
                            title="Settings">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                </path>
                            </svg>
                        </button>
                        <div x-show="openSettings" @click.away="openSettings = false"
                            class="bg-white absolute w-40 py-2 mt-1 border border-gray-200 shadow-2xl"
                            style="display: none;">
                            <div class="xpy-2 border-b">
                                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Opciones</p>
                                <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                        </path>
                                    </svg>
                                    <span class="text-sm text-gray-700">Compartir</span>
                                </button>
                                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                        </path>
                                    </svg>
                                    <span class="text-sm text-gray-700">Denunciar</span>
                                </button>
                                {{-- <button class=" hidden w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">More Info</span>
                                </button> --}}
                            </div>
                            <div class="py-2">
                                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Donwload</p>
                                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                                    <span class="text-sm text-gray-700">CV</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span> --}}
                </div>
                <div class="flex justify-between gap-4">
                    <p class="text-gray-700">{{  $profile->category->name }}</p>
                    <div class=" mt-1 flex justify-center ">
                        <ul class="flex text-xs mr-1">
                            <li><i class="fas fa-star text-yellow-400 "></i>
                            </li>
                            <li><i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li><i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li><i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li><i class="fas fa-star text-yellow-400"></i>
                            </li>

                        </ul>
                        <span
                            class=" md:text-xs bg-yellow-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ">4.5</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500">{{ $profile->city }} -  {{ $profile->state }}</p>


            </div>
            <div class="lg:flex  items-center lg:items-end justify-between px-8 mt-2">
                <div class="flex items-center justify-center gap-4 mt-2">
                    <a href="#" class="text-blue-500 hover:text-gray-900 dark:hover:text-white">

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-red-500 hover:text-gray-900 dark:hover:text-white">

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-gray-900 dark:hover:text-white">

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-green-500 hover:text-gray-900 ">
                        <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"
                            alt="">

                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-youtube2.svg') }}"
                            alt="">

                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-tiktok2.svg') }}"
                            alt="">
                    </a>
                    <a href="#" title="LinkedIn">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333"
                            shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm-18220 138885h28897v14814l418 1c4024-7220 13865-14814 28538-14814 30514-1 36157 18989 36157 43691v50320l-30136 1v-44607c0-10634-221-24322-15670-24322-15691 0-18096 11575-18096 23548v45382h-30109v-94013zm-20892-26114c0 8650-7020 15670-15670 15670s-15672-7020-15672-15670 7022-15670 15672-15670 15670 7020 15670 15670zm-31342 26114h31342v94013H96213v-94013z"
                                fill="#0077b5"></path>
                        </svg>
                    </a>
                    <a href="#" title="Github">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="0" height="0"
                            shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                            viewBox="0 0 640 640">
                            <path
                                d="M319.988 7.973C143.293 7.973 0 151.242 0 327.96c0 141.392 91.678 261.298 218.826 303.63 16.004 2.964 21.886-6.957 21.886-15.414 0-7.63-.319-32.835-.449-59.552-89.032 19.359-107.8-37.772-107.8-37.772-14.552-36.993-35.529-46.831-35.529-46.831-29.032-19.879 2.209-19.442 2.209-19.442 32.126 2.245 49.04 32.954 49.04 32.954 28.56 48.922 74.883 34.76 93.131 26.598 2.882-20.681 11.15-34.807 20.315-42.803-71.08-8.067-145.797-35.516-145.797-158.14 0-34.926 12.52-63.485 32.965-85.88-3.33-8.078-14.291-40.606 3.083-84.674 0 0 26.87-8.61 88.029 32.8 25.512-7.075 52.878-10.642 80.056-10.76 27.2.118 54.614 3.673 80.162 10.76 61.076-41.386 87.922-32.8 87.922-32.8 17.398 44.08 6.485 76.631 3.154 84.675 20.516 22.394 32.93 50.953 32.93 85.879 0 122.907-74.883 149.93-146.117 157.856 11.481 9.921 21.733 29.398 21.733 59.233 0 42.792-.366 77.28-.366 87.804 0 8.516 5.764 18.473 21.992 15.354 127.076-42.354 218.637-162.274 218.637-303.582 0-176.695-143.269-319.988-320-319.988l-.023.107z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="flex items-center justify-center gap-4 mt-2">
                    <button
                        class="  flex items-center bg-blue-600 hover:bg-green-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                            </path>
                        </svg>
                        <span>Agregar</span>
                    </button>
                    <button
                        class="flex items-center bg-blue-600  hover:bg-rose-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Recomendar</span>
                    </button>
                   

                </div>
            </div>
        </div>

        <div class="my-4 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
            <div class="lg:w-1/3 flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <div class="flex items-center gap-4">
                        <h4 class="text-xl text-gray-900 font-bold">Estudios Realizados</h4>
                        <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                    </div>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Diplomado en Educacion Superior <a href="#"
                                        class="text-blue-600 font-bold">CEPIES</a>.</p>
                                <p class="text-xs text-gray-500">2001</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Diplomado en Educacion Superior <a href="#"
                                        class="text-blue-600 font-bold">CEPIES</a>.</p>
                                <p class="text-xs text-gray-500">Docencia de Universidad</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Invoice <a href="#"
                                        class="text-blue-600 font-bold">#4563</a> was created.</p>
                                <p class="text-xs text-gray-500">57 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#"
                                        class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">New order received <a href="#"
                                        class="text-blue-600 font-bold">#OR9653</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Jane
                                        Stillman</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Invoice <a href="#"
                                        class="text-blue-600 font-bold">#4563</a> was created.</p>
                                <p class="text-xs text-gray-500">57 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#"
                                        class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">New order received <a href="#"
                                        class="text-blue-600 font-bold">#OR9653</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Jane
                                        Stillman</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <div class="flex items-center gap-4">
                        <h4 class="text-xl text-gray-900 font-bold">Experiencia Laboral</h4>
                        <i class="fas fa-backpack text-blue-600 text-xl"></i>
                        <i class="fas fa-backpack"></i>
                    </div>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Diplomado en Educacion Superior <a href="#"
                                        class="text-blue-600 font-bold">CEPIES</a>.</p>
                                <p class="text-xs text-gray-500">2001</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Diplomado en Educacion Superior <a href="#"
                                        class="text-blue-600 font-bold">CEPIES</a>.</p>
                                <p class="text-xs text-gray-500">Docencia de Universidad</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Invoice <a href="#"
                                        class="text-blue-600 font-bold">#4563</a> was created.</p>
                                <p class="text-xs text-gray-500">57 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#"
                                        class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">New order received <a href="#"
                                        class="text-blue-600 font-bold">#OR9653</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Jane
                                        Stillman</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:w-2/3 2xl:w-2/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Nosotros</h4>
                    <p class="mt-2 text-gray-700">{{ $profile->about }}</p>
                    <h4 class="text-xl text-gray-900 font-bold mt-4">Información Personal</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex  border-y py-2">
                            <span class="font-bold w-48">Nombre del Propietario:</span>
                            <span class="text-gray-700">{{ $profile->name }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-48">Registro Profesional:</span>
                            <span class="text-gray-700">{{ $profile->rpa }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-48">NIT:</span>
                            <span class="text-gray-700">{{ $profile->nit }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-48">Celular:</span>
                            <span class="text-gray-700">{{ $profile->phone }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-48">Email:</span>
                            <span class="text-gray-700">{{ $profile->email }}</span>
                        </li>
                    </ul>
                    
                        <div class="w-full">
                            <div class=" flex w-full h-full max-w-full justify-center rounded-lg bg-white p-2 shadow-md shadow-blue-500/10">
                                {!! $profile->iframe  !!}
                            </div>
                        </div>
                    
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Ultimos Clientes</h4>

                    <div
                        class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-8 mt-8 items-center justify-center">


                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection9.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Lucas Bell</p>
                            <p class="text-xs text-gray-500 text-center">Creative Writer at Upwork</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection10.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Debra Herring</p>
                            <p class="text-xs text-gray-500 text-center">Co-Founder at Alpine.js</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection11.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Benjamin Farrior</p>
                            <p class="text-xs text-gray-500 text-center">Software Engineer Lead at Microsoft</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection12.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Maria Heal</p>
                            <p class="text-xs text-gray-500 text-center">Linux System Administrator at Twitter</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection13.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Edward Ice</p>
                            <p class="text-xs text-gray-500 text-center">Customer Support at Instagram</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection14.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Jeffery Silver</p>
                            <p class="text-xs text-gray-500 text-center">Software Engineer at Twitter</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection15.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Jennifer Schultz</p>
                            <p class="text-xs text-gray-500 text-center">Project Manager at Google</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600"
                            title="View Profile">
                            <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection16.jpg"
                                class="w-16 rounded-full">
                            <p class="text-center font-bold text-sm mt-1">Joseph Marlatt</p>
                            <p class="text-xs text-gray-500 text-center">Team Lead at Facebook</p>
                        </a>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Servicios</h4>
                    <div class="mt-6 flex flex-wrap gap-4 justify-center">

                        <img src="{{ asset('assets/imgs/banner/brand-1.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 bg-white px-10 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">

                        <img src="{{ asset('assets/imgs/banner/brand-2.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">
                        <img src="{{ asset('assets/imgs/banner/brand-3.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">
                        <img src="{{ asset('assets/imgs/banner/brand-4.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">
                        <img src="{{ asset('assets/imgs/banner/brand-5.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 px-5 py-3 shadow-lg shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">
                        <img src="{{ asset('assets/imgs/banner/brand-6.png') }}" alt="brand"
                            class=" w-52 cursor-pointer rounded-xl border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-75 hover:shadow-lg ">
                    </div>


                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-xl p-8 my-6">
            <h4 class="text-xl text-gray-900 font-bold">Statistics</h4>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-4">
                <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-indigo-600">Total de Clientes 2023</span>
                        <span
                            class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">Ultimos
                            7
                            Días</span>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div>
                            <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-end">
                                <span class="text-2xl 2xl:text-3xl font-bold">999</span>
                                <div class="flex items-center ml-2 mb-1">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span class="font-bold text-sm text-gray-500 ml-0.5">3%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-green-600">Clientes Satisfechos</span>
                        <span
                            class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">ultimos
                            7
                            Días</span>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div>
                            <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-end">
                                <span class="text-2xl 2xl:text-3xl font-bold">217</span>
                                <div class="flex items-center ml-2 mb-1">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span class="font-bold text-sm text-gray-500 ml-0.5">5%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-blue-600">Nuevos Clientes</span>
                        <span
                            class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">Ultimos
                            7
                            Días</span>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div>
                            <svg class="w-12 h-12 p-2.5 bg-blue-400 bg-opacity-20 rounded-full text-blue-600 border border-blue-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-end">
                                <span class="text-2xl 2xl:text-3xl font-bold">554</span>
                                <div class="flex items-center ml-2 mb-1">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span class="font-bold text-sm text-gray-500 ml-0.5">7%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <canvas id="verticalBarChart"
                    style="display: block; box-sizing: border-box; height: 414px; width: 828px;" width="1656"
                    height="828"></canvas>
            </div>

        </div>


    </div>
    @push('chart')
        <script src="{{ asset('assets/js/chart.js') }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script> --}}
        <script>
            const DATA_SET_VERTICAL_BAR_CHART_1 = [68.106, 26.762, 94.255, 72.021, 74.082, 64.923, 85.565, 32.432, 54.664,
                87.654, 43.013, 91.443
            ];

            const labels_vertical_bar_chart = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            const dataVerticalBarChart = {
                labels: labels_vertical_bar_chart,
                datasets: [{
                    label: 'Meses 2022',
                    data: DATA_SET_VERTICAL_BAR_CHART_1,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                }]
            };
            const configVerticalBarChart = {
                type: 'bar',
                data: dataVerticalBarChart,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Clientes atendidos por mes'
                        }
                    }
                },
            };

            var verticalBarChart = new Chart(
                document.getElementById('verticalBarChart'),
                configVerticalBarChart
            );
        </script>
    @endpush
</section>
</x-app-layout>