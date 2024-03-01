<x-app-layout>
<section class="bg-gray-200">
    <div class="h-full  p-8 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="{{ Storage::url($profile->image->url) }}" class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="{{ $profile->user->profile_photo_url }}" class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{ $profile->name }}</p>
                    <div x-data="{ openSettings: false }" class="hover:bg-slate-600 rounded">
                        <button @click="openSettings = !openSettings" class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20" title="Settings">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                        <div x-show="openSettings" @click.away="openSettings = false" class="bg-white absolute w-40 py-2 mt-1 border border-gray-200 shadow-2xl" style="display: none;">
                            <div class="xpy-2 border-b">
                                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Opciones</p>
                                <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">Compartir</span>
                                </button>
                                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">Denunciar</span>
                                </button>
                            </div>
                            <div class="py-2">
                                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Donwload</p>
                                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">CV</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between gap-4">
                    <p class="text-gray-700">{{  $profile->category->name }}</p>
                    <div class="mt-1 flex justify-center">
                        <ul class="flex text-xs mr-1">
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                        </ul>
                        <span class="md:text-xs bg-yellow-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">4.5</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500">{{ $profile->city }} -  {{ $profile->state }}</p>
            </div>
            <div class="lg:flex items-center lg:items-end justify-between px-8 mt-2">
                <div class="flex items-center justify-center gap-4 mt-2">
                    <a href="#" class="text-blue-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <!-- Agrega aquí otros enlaces sociales -->
                </div>
                <div class="flex items-center justify-center gap-4 mt-2">
                    <button class="flex items-center bg-blue-600 hover:bg-green-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <!-- Agrega aquí el icono para agregar -->
                        </svg>
                        <span>Agregar</span>
                    </button>
                    <button class="flex items-center bg-blue-600 hover:bg-rose-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <!-- Agrega aquí el icono para recomendar -->
                        </svg>
                        <span>Recomendar</span>
                    </button>
                    <!-- Agrega aquí otros botones de acción -->
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