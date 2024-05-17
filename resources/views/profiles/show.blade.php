<x-app-layout>
    <section class="bg-gray-200">
        <div class="h-full p-8 max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl pb-4">
                <div class="w-full h-auto">
                    @isset($profile->image)
                        <img src="{{ Storage::url($profile->image->url) }}"
                            class="w-full h-auto object-center object-cover rounded-tl-lg rounded-tr-lg">
                    @else
                        <img class="w-32 h-32 object-cover rounded-tl-lg rounded-tr-lg"
                            src="{{ asset('img/home/imagen-no-disponible.png') }}" alt="">
                    @endisset
                </div>
                <div class="flex flex-col items-center -mt-8">
                    <img src="{{ $profile->user->profile_photo_url }}"
                        class=" border-4 border-white rounded-full w-16 object-center object-cover h-16 sm:w-20 md:w-22 lg:w-24 xl:w-26 sm:h-20 md:h-22 lg:h-24 xl:h-26">
                    <div class="flex items-center space-x-2 mt-2 mb-4">

                        <div x-data="{ openSettings: false }" class="hover:bg-slate-600 rounded">

                            <button @click="openSettings = !openSettings"
                                class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20"
                                title="Opciones">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                            </path>
                                        </svg>
                                        <span class="text-sm text-gray-700">Compartir</span>
                                    </button>
                                    <button
                                        class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200 hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                            </path>
                                        </svg>
                                        <span class="text-sm text-gray-700">Denunciar</span>
                                    </button>
                                </div>

                                <a href="{{ route('profile.cv') }}">
                                    <div class="py-2">
                                        <p class="text-gray-400 text-xs px-6 uppercase mb-1">Donwload</p>
                                        <button
                                            class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                            <span class="text-sm text-gray-700">CV</span>
                                        </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="text-md sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl">{{ $profile->name }}</p>

                </div>
                <div class="flex justify-between gap-4">
                    <p class="text-gray-700">{{ $profile->category->name }}</p>
                    <div class="mt-1 flex justify-center">
                        <ul class="flex text-sm">
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{ $profile->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{ $profile->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{ $profile->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{ $profile->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{ $profile->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">{{ $profile->rating }}</span>
                        </ul>
                    </div>
                </div>
                <p class="text-sm text-gray-500">
                    @if ($profile->city)
                        {{ $profile->city }}
                    @endif -
                    @if ($profile->state)
                        {{ $profile->state }}
                    @endif
                </p>
            </div>
            <div class="lg:flex items-center lg:items-end justify-between px-8 mt-2">
                <div class="flex items-center justify-center gap-4 mt-2">
                    @forelse ($profile->socials as $item)
                        <!-- start::Timeline item -->
                        <a href="{{ $item->link }}" class="text-blue-500 hover:text-gray-900">
                            {!! $item->icon !!}
                        </a>
                        <!-- end::Timeline item -->

                    @empty
                    @endforelse
                </div>
                <div class="flex items-center justify-center gap-4 mt-2">

                    <div x-data="{ isOpen: false }">
                        
                        <button @click="isOpen = true"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <i class="fas fa-star text-gray-100 h-4 w-4"></i>
                            Calificar
                        </button>
                    
                      
                        <div x-show="isOpen" x-transition.opacity @keydown.escape.window="isOpen = false"
                            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
                            <div @click.away="isOpen = false" class="relative w-full max-w-2xl max-h-full p-4">
                                
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                   
                                    <div class="p-4 md:p-5 space-y-4">
                                        @livewire('courses-reviews', ['model' => $profile])
                                    </div>
                                    
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/{{ $profile->phone }}"
                        class="flex items-center cursor-pointer bg-green-600 hover:bg-green-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <i class="fab fa-whatsapp text-gray-100 h-4 w-4"></i>
                        <span>Contactar</span>
                    </a>
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
                        @forelse ($profile->educations as $item)
                            <!-- start::Timeline item -->
                            <div class="flex items-center w-full my-6 -ml-1.5">
                                <div class="w-1/12 z-10">
                                    <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                </div>
                                <div class="w-11/12">
                                    <p class="text-sm">
                                        {{ $item->title }} <a href="#" class="text-blue-600 font-bold">
                                            {{ $item->institution }}</a>.</p>
                                    <p class="text-xs text-gray-500">{{ $item->gestion }}</p>
                                </div>
                            </div>
                            <!-- end::Timeline item -->

                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <div class="flex items-center gap-4">
                        <h4 class="text-xl text-gray-900 font-bold">Experiencia Laboral</h4>
                        <i class="fas fa-diagnoses text-blue-600 text-xl"></i>

                    </div>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                        @forelse ($profile->experiences as $item)
                            <!-- start::Timeline item -->
                            <div class="flex items-center w-full my-6 -ml-1.5">
                                <div class="w-1/12 z-10">
                                    <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                </div>
                                <div class="w-11/12">
                                    <p class="text-sm">
                                        {{ $item->title }} <a href="#" class="text-blue-600 font-bold">
                                            {{ $item->institution }}</a>.</p>
                                    <p class="text-xs text-gray-500">{{ $item->gestion }}</p>
                                </div>
                            </div>
                            <!-- end::Timeline item -->

                        @empty
                        @endforelse

                        <!-- end::Timeline item -->
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:w-2/3 2xl:w-2/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    @if ($profile->about)
                        <h4 class="text-xl text-gray-900 font-bold">Nosotros</h4>
                        <p class="mt-2 text-gray-700">{{ $profile->about }}</p>
                    @endif
                    <h4 class="text-xl text-gray-900 font-bold mt-4">Información Profesional</h4>
                    <ul class="mt-2 text-gray-700">
                        @if ($profile->name)
                            <li class="flex  border-y py-2">
                                <span class="font-bold w-48">Nombre del Propietario:</span>
                                <span class="text-gray-700">{{ $profile->name }}</span>
                            </li>
                        @endif

                        @if ($profile->rpa)
                            <li class="flex border-b py-2">
                                <span class="font-bold w-48">Registro Profesional:</span>
                                <span class="text-gray-700">{{ $profile->rpa }}</span>
                            </li>
                        @endif
                        @if ($profile->nit)
                            <li class="flex border-b py-2">
                                <span class="font-bold w-48">NIT:</span>
                                <span class="text-gray-700">{{ $profile->nit }}</span>
                            </li>
                        @endif
                        @if ($profile->phone)
                            <li class="flex border-b py-2">
                                <span class="font-bold w-48">Celular:</span>
                                <span class="text-gray-700">{{ $profile->phone }}</span>
                            </li>
                        @endif
                        @if ($profile->email)
                            <li class="flex border-b py-2">
                                <span class="font-bold w-48">Email:</span>
                                <span class="text-gray-700 text-sm sm:text-md lg:text-lg">{{ $profile->email }}</span>
                            </li>
                        @endif
                    </ul>

                    <div class="w-full">
                        @if ($profile->latitude && $profile->longitude)
                            <div id="mapid" class="h-64 md:h-auto z-0"></div>
                        @endif

                    </div>

                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <div class="border mt-2 p-2 mb-4 bg-gray-200 rounded-2xl">
                        {{-- @livewire('courses-reviews', ['model' => $profile]) --}}
                    </div>
                    {{-- <h4 class="text-xl text-gray-900 font-bold">Estadistica</h4>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-4">
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-sm text-indigo-600">Calificaciones</span>
                                    
                                </div>
                                <div class="flex items-center justify-between mt-6">
                                    <div>
                                        <i class="fas fa-star text-yellow-400"></i>

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex items-end">
                                            <span class="text-2xl 2xl:text-3xl font-bold">999</span>
                                            <div class="flex items-center ml-2 mb-1">
                                                <svg class="w-5 h-5 text-green-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                                <span class="font-bold text-sm text-gray-500 ml-0.5">3%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-sm text-green-600">Cursos</span>                                   
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
                                                <svg class="w-5 h-5 text-green-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                                <span class="font-bold text-sm text-gray-500 ml-0.5">5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-sm text-blue-600">Artículos</span>                                   
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
                                                <svg class="w-5 h-5 text-green-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
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
                                style="display: block; box-sizing: border-box; height: 414px; width: 828px;"
                                width="1656" height="828"></canvas>
                        </div> --}}
                </div>
                {{-- <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
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


                    </div> --}}
            </div>
        </div>



        </div>
        @push('chart')
            <script src="{{ asset('assets/js/chart.js') }}"></script>
            <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
                integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
                crossorigin=""></script>

            <script>
                if ({{ $profile->latitude }}) {
                    var map = L.map('mapid').setView([{{ $profile->latitude }}, {{ $profile->longitude }}],
                        {{ config('leaflet.detail_zoom_level') }});
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    var marker = L.marker([{{ $profile->latitude }}, {{ $profile->longitude }}]).addTo(map);

                }
            </script>
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
