@extends('layouts.outlet')

@section('title', __('outlet.create'))

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-1/2">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-gray-700 font-bold mb-4">Registro de nuevo Centro Inclusivo</div>
                <form method="POST" action="{{ route('outlets.store') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Centro</label>
                        <input id="name" type="text"
                            class="form-input{{ $errors->has('name') ? ' border-red-500' : '' }}" name="name"
                            value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email de Web o
                                Email</label>
                            <input id="email" type="text"
                                class="form-input{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email"
                                value="{{ old('email') }}" required>
                            {!! $errors->first('email', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                        </div>
                        <div class="w-1/2">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Contacto</label>
                            <input id="phone" type="text"
                                class="form-input{{ $errors->has('phone') ? ' border-red-500' : '' }}" name="phone"
                                value="{{ old('phone') }}" required>
                            {!! $errors->first('phone', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mr-2 gap-2">
                            <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                            <select id="category_id" name="category_id" class="form-select{{ $errors->has('category_id') ? ' border-red-500' : '' }}" required>
                                <option value="" selected disabled>Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                            <label for="city" class="text-gray-700 text-sm font-bold">Ciudad</label>
                            <select id="city" name="city" required>
                                <option value="" selected disabled>Selecciona un Departamento</option>
                                <option value="La Paz" {{ old('department_id') == 1 ? 'selected' : '' }}>El Alto</option>
                                <option value="El Alto" {{ old('department_id') == 1 ? 'selected' : '' }}>La Paz</option>
                                <option value="Oruro" {{ old('department_id') == 2 ? 'selected' : '' }}>Oruro</option>
                                <option value="Potosí" {{ old('department_id') == 3 ? 'selected' : '' }}>Potosí</option>
                                <option value="Tarija" {{ old('department_id') == 4 ? 'selected' : '' }}>Tarija</option>
                                <option value="Santa Cruz" {{ old('department_id') == 5 ? 'selected' : '' }}>Santa Cruz</option>
                                <option value="Beni" {{ old('department_id') == 6 ? 'selected' : '' }}>Beni</option>
                                <option value="Pando" {{ old('department_id') == 7 ? 'selected' : '' }}>Pando</option>
                                <option value="Cochabamba" {{ old('department_id') == 8 ? 'selected' : '' }}>Cochabamba</option>
                                <option value="Sucre" {{ old('department_id') == 9 ? 'selected' : '' }}>Sucre</option>
                            </select>
                        </div>
                        
                        <div class="w-1/2 mr-2">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                            <input id="address" type="text"
                                class="form-input{{ $errors->has('address') ? ' border-red-500' : '' }}" name="address"
                                value="{{ old('address') }}" required>
                            {!! $errors->first('address', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="latitude"
                                class="block text-gray-700 text-sm font-bold mb-2">Latitude</label>
                            <input id="latitude" type="text"
                                class="form-input{{ $errors->has('latitude') ? ' border-red-500' : '' }}" name="latitude"
                                value="{{ old('latitude', request('latitude')) }}" required>
                            {!! $errors->first('latitude', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                        </div>
                        <div class="w-1/2">
                            <label for="longitude"
                                class="block text-gray-700 text-sm font-bold mb-2">Longitude</label>
                            <input id="longitude" type="text"
                                class="form-input{{ $errors->has('longitude') ? ' border-red-500' : '' }}" name="longitude"
                                value="{{ old('longitude', request('longitude')) }}" required>
                            {!! $errors->first('longitude', '<p class="text-red-500 text-xs italic">:message</p>') !!}
                        </div>
                    </div>
                    <div id="mapid" class="mt-4 h-64 sm:h-96 lg:h-128 w-full"></div>
                    <div class="flex items-center justify-between mt-4">
                        <button class="btn btn-primary ml-2">Registrar Centro</button>
                        {{-- <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Registrar Centro</button> --}}
                        <a href="{{ route('outlets.index') }}" class="btn btn-red ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script>
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }},
            {{ request('longitude', config('leaflet.map_center_longitude')) }}
        ];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(mapCenter).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Your location :  " + marker.getLatLng().toString())
                .openPopup();
            return false;
        };

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            updateMarker(latitude, longitude);
        });

        var updateMarkerByInputs = function() {
            return updateMarker($('#latitude').val(), $('#longitude').val());
        }
        $('#latitude').on('input', updateMarkerByInputs);
        $('#longitude').on('input', updateMarkerByInputs);
    </script>
@endpush
