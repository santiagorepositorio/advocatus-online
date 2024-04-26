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
                    <option value="" selected disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <select id="city" name="city" required>
                    <option value="" selected disabled>Selecciona un Departamento</option>
                    <option value="1" {{ old('department_id') == 1 ? 'selected' : '' }}>La Paz</option>
                    <option value="2" {{ old('department_id') == 2 ? 'selected' : '' }}>Oruro</option>
                    <option value="3" {{ old('department_id') == 3 ? 'selected' : '' }}>Potosí</option>
                    <option value="4" {{ old('department_id') == 4 ? 'selected' : '' }}>Tarija</option>
                    <option value="5" {{ old('department_id') == 5 ? 'selected' : '' }}>Santa Cruz</option>
                    <option value="6" {{ old('department_id') == 6 ? 'selected' : '' }}>Beni</option>
                    <option value="7" {{ old('department_id') == 7 ? 'selected' : '' }}>Pando</option>
                    <option value="8" {{ old('department_id') == 8 ? 'selected' : '' }}>Cochabamba</option>
                    <option value="9" {{ old('department_id') == 9 ? 'selected' : '' }}>Chuquisaca</option>
                </select>
            </div>


        </div>
        <div id="" class=" max-w-full mx-auto py-4">
            <div id="mapid"></div>
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
            padding: 10px;
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

        function searchLocations(query) {
            axios.get('{{ route('api.outlets.index') }}', {
                    params: {
                        search: query
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
            searchLocations(searchQuery);
        });

        document.getElementById('show-all-btn').addEventListener('click', function() {
            loadAllLocations(); // Cargar todos los marcadores
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
