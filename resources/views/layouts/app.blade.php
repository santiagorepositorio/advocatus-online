<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/imgs/logo/advocatus-icono.png') }}">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Required Core Stylesheet -->


    <style>
        .swiper-slide {
            width: 200px;
            height: auto !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />

    <style>
        #mapid {
            height: 27vh;
            border: 1px solid #CBD5E0;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .modal-enter-active,
        .modal-leave-active {
            transition: opacity 0.25s ease;
        }

        .modal-enter,
        .modal-leave-to {
            opacity: 0;
        }
    </style>

    <!-- Styles -->
    @livewireStyles
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <meta name="facebook-domain-verification" content="nznszlt2xwcogpvk399ott01z0ezuu" />

</head>


<body class="font-sans antialiased">

    @php
        if (!function_exists('contar')) {
            function contar()
            {
                $ip = request()->ip(); // Usar request() para obtener la IP
                $today = now()->toDateString(); // Obtener la fecha de hoy

                $contarC = \App\Models\Counter::where('ip', $ip)->whereDate('created_at', $today)->count();

                if ($contarC == 0) {
                    \App\Models\Counter::create([
                        'ip' => $ip,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // Llamar a la función contar
        contar();
    @endphp
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        {{-- @livewire('navigator-advocatus') --}}



        <!-- Page Content -->
        {{-- @livewire('navigator-advocatus') --}}
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @stack('payment-scripts')
    @stack('time')
    @stack('chart')
    @stack('cs')
    @stack('carrusel')





    @livewireScripts
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @method('scripts')
    @isset($js)
        {{ $js }}
    @endisset

    <footer class=" container p-4 bg-white sm:p-6  mb-3">
        <div hidden><a href="#"><img
                    class="fixed z-90 bottom-10 right-8  w-12 h-12  drop-shadow-lg flex justify-center items-center hover:drop-shadow-2xl hover:animate-bounce duration-300"
                    src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a></div>
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="/" class="flex-shrink-0 flex items-center mx-6 lg:mx-0">
                    <img class="block lg:hidden h-12 w-auto mx-auto"
                        src="{{ asset('assets/imgs/logo/advocatus-logo.png') }}" alt="">
                    <img class="hidden lg:block h-12 w-auto" src="{{ asset('assets/imgs/logo/advocatus-logo.png') }}"
                        alt="ITSW">
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Referencias</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Portafolio</a>
                        </li>
                        <li>
                            <a href="https://sobotredsystems.com/" class="hover:underline">Pagina Central</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Trabajos</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            <a href="#" class="hover:underline ">Sistemas Web</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Sistemas Android</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Legal</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            <a href="{{ route('privacy-policy') }}" class="hover:underline">Politicas de Privacidad</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Terminos &amp; Condiciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center ">© 2024 <a href="https://sobotredsystems.com/"
                    class="hover:underline">Santiago Boris Quispe Apaza™</a>. All
                Rights
                Reserved.
            </span>

            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-blue-500 hover:text-gray-900 ">

                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>

                <a href="#" class="text-green-500 hover:text-gray-900 ">
                    <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}" alt="">

                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 ">
                    <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-youtube2.svg') }}" alt="">

                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 ">
                    <img class="w-5 h-5" src="{{ asset('assets/imgs/theme/icons/icon-tiktok2.svg') }}" alt="">
                </a>
            </div>
        </div>
    </footer>
    <!-- Implement the Back Top Top Button -->
    <button id="to-top-button" onclick="goToTop()" title="Go To Top"
        class="hidden fixed z-50 bottom-8 right-8 border-0 w-12 h-12 rounded-full drop-shadow-md bg-blue-500 hover:bg-blue-800 text-white text-3xl font-bold">&uarr;</button>

    <!-- Javascript code -->
    <script>
        var toTopButton = document.getElementById("to-top-button");

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }

        // When the user clicks on the button, smoothy scroll to the top of the document
        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    <script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        let valueDisplays = document.querySelectorAll(".num");
        let interval = 4000;
        valueDisplays.forEach((valueDisplay) => {
            let startValue = 0;
            let endValue = parseInt(valueDisplay.getAttribute("data-val"));
            let duration = Math.floor(interval / endValue);
            let counter = setInterval(function() {
                startValue += 1;
                valueDisplay.textContent = startValue;
                if (startValue == endValue) {
                    clearInterval(counter);
                }
            }, duration);
        });
    </script>


    @stack('swipe')
    @stack('glider')
    @stack('jseditor')
</body>

</html>
