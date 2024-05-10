<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/imgs/logo/icono.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />

    <!-- Styles -->
    <style>
        #mapid {
            height: 27vh;
            border: 1px solid #CBD5E0;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        /* Estilo personalizado para el botón de "Mostrar mi ubicación" */
        .leaflet-control-locate {
            background-color: #4CAF50;
            /* Color de fondo */
            border: none;
            border-radius: 50%;
            /* Hacer el botón redondo */
            padding: 10px;
            /* Espaciado interior */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Sombra */
        }

        .leaflet-control-locate a {
            font-size: 1rem;
            /* Tamaño del icono */
            color: #550e0e;
            /* Color del icono */
        }

        .leaflet-control-locate a:hover {
            color: #004d88;
            /* Color del icono al pasar el ratón */
        }
    </style>
    @livewireStyles
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')



        <!-- Page Content -->
        <div class="container py-8 grid grid-cols-5">
            <aside>
                <h1 class="font-bold text-lg mb-4">Edicion del Perfil Profesional</h1>
                <ul class="text-sm text-gray-600">
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('edit.profile', $profile) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('edit.profile', $profile) }}"> Informacion del Perfil</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('profile.educations', $profile) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('profile.educations', $profile) }}"> Estudios Realizados</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('profile.experiences', $profile) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('profile.experiences', $profile) }}">Experiencia Laboral</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('profile.socials', $profile) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('profile.socials', $profile) }}">Redes Sociales</a>
                    </li>
                    {{-- <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.edit', $course) }}"> Informacion del Curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}"> Lecciones del Curso</a>
                    </li>


                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400
@else
border-transparent @endif t pl-2">
                        <a href="{{ route('instructor.courses.goals', $course) }}">Metas del Curso</a>
                    </li> --}}


                    {{-- <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.certificate', $course) border-indigo-400
@else
border-transparent @endif t pl-2">
                        <a href="{{ route('instructor.courses.certificate', $course) }}">Link WhatsApp y Certificado</a>
                    </li> --}}




                    <li>
                        <hr class="mt-2 mb-6">
                    </li>
                    <li>
                        <a class="btn btn-danger ml-2 mt-2" href="{{ route('instructor.courses.index') }}">SALIR</a>
                    </li>


                </ul>

            </aside>

            <div class="col-span-4 card">

                <main class="card-body text-gray-600">
                    {{ $slot }}

                </main>

            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')))
        </script>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    @isset($js)
        {{ $js }}
    @endisset
</body>

</html>
