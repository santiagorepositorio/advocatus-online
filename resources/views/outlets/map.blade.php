@extends('layouts.outlet')

@section('content')
    <section class="bg-gray-700 py-4 mb-4">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div id="search-box" class="w-full lg:w-auto flex items-center mb-2 lg:mb-0 lg:mr-2">
                <input type="text" id="search-input" class="flex-1 border-gray-300 rounded-l-md lg:rounded-l-none"
                    placeholder="Buscar ubicación">
                <button id="search-btn"
                    class="bg-green-500 text-white px-4 py-2 rounded-r-md lg:rounded-r-none">Buscar</button>
            </div>
            <div class=" gap-4">
                <button id="show-all-btn" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-2 lg:mb-0">Mostrar
                    todo</button>

                <select id="category_id" name="category_id" required>
                    {{-- <option value="" selected disabled>Selecciona una categoría</option> --}}
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <select id="city" name="city" required>
                    <option value="" selected disabled>Selecciona un Departamento</option>
                    <option value="La Paz">La Paz</option>
                    <option value="El Alto">El Alto</option>
                    <option value="Oruro">Oruro</option>
                    <option value="Potosí">Potosí</option>
                    <option value="Tarija">Tarija</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Beni">Beni</option>
                    <option value="Pando">Pando</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Sucre">Sucre</option>
                </select>
            </div>


        </div>
        <div id="" class=" max-w-full mx-auto py-4">
            <div id="mapid" class="z-0"></div>
        </div>
    </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <style>
        #mapid {
            height: 80vh;
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
           
            /* Espaciado interior */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Sombra */
        }

        .leaflet-control-locate a {
            font-size: 1.5rem;
            /* Tamaño del icono */
            color: #550e0e;
            /* Color del icono */
        }

        .leaflet-control-locate a:hover {
            color: #004d88;
            /* Color del icono al pasar el ratón */
        }
    </style>
@endsection

@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <script src="https://unpkg.com/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>

    <script>
        @if (auth()->check())
            window.userRoles = {!! json_encode(auth()->user()->roles->pluck('name')) !!};
        @else
            window.userRoles = [];
        @endif

        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
            {{ config('leaflet.map_center_longitude') }}
        ], {{ config('leaflet.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = L.markerClusterGroup();

        function loadAllLocations() {
            axios.get('{{ route('api.outlets.index') }}')
                .then(function(response) {
                    var marker = L.geoJSON(response.data, {
                        pointToLayer: function(geoJsonPoint, latlng) {
                            return L.marker(latlng).bindPopup(function(layer) {
                                return layer.feature.properties.map_popup_content;
                            });
                        }
                    });
                    markers.clearLayers(); // Limpiar marcadores existentes antes de agregar nuevos
                    markers.addLayer(marker);
                    map.fitBounds(markers.getBounds()); // Ajustar el mapa para que todos los marcadores sean visibles
                })
                .catch(function(error) {
                    console.log(error);
                });
            map.addLayer(markers);
        }

        // Cargar todos los marcadores al iniciar
        loadAllLocations();

        function searchLocations(query, city, category_id) {
            axios.get('{{ route('api.outlets.index') }}', {
                    params: {
                        search: query,
                        city: city,
                        category_id: category_id
                    }
                })
                .then(function(response) {
                    var marker = L.geoJSON(response.data, {
                        pointToLayer: function(geoJsonPoint, latlng) {
                            return L.marker(latlng).bindPopup(function(layer) {
                                return layer.feature.properties.map_popup_content;
                            });
                        }
                    });
                    markers.clearLayers(); // Limpiar marcadores existentes antes de agregar nuevos
                    markers.addLayer(marker);
                    map.fitBounds(markers.getBounds()); // Ajustar el mapa para que todos los marcadores sean visibles
                })
                .catch(function(error) {
                    console.log(error);
                });
            map.addLayer(markers);
        }

        // Evento click para el botón de búsqueda
        document.getElementById('search-btn').addEventListener('click', function() {
            var searchQuery = document.getElementById('search-input').value;
            var city = document.getElementById('city').value;
            var category_id = document.getElementById('category_id').value;
            console.log(searchQuery, city, category_id);
            searchLocations(searchQuery, city, category_id);
        });

        document.getElementById('show-all-btn').addEventListener('click', function() {
            // Limpiar los campos de búsqueda y cargar todos los marcadores
            document.getElementById('search-input').value = '';
            document.getElementById('city').selectedIndex = 0;
            document.getElementById('category_id').selectedIndex = 0;
            loadAllLocations();
        });

        // Verificar si el usuario tiene el rol "Colaborador"
        if (window.userRoles.includes('Colaborador')) {
            // El usuario tiene el rol "Colaborador"
            var theMarker;

            map.on('click', function(e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);

                if (theMarker != undefined) {
                    map.removeLayer(theMarker);
                };

                var popupContent = "Ubicación : " + latitude + ", " + longitude + ".";
                popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude +
                    '&longitude=' + longitude + '">Agregar nueva ubicación</a>';

                theMarker = L.marker([latitude, longitude]).addTo(map);
                theMarker.bindPopup(popupContent)
                    .openPopup();
            });

        }
        // Botón para mostrar ubicación actual
        L.control.locate({
            position: 'topright', // Posición del botón
            strings: {
                title: "Mostrar mi ubicación"
            }
        }).addTo(map);
    </script>
@endpush
