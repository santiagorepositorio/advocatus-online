@extends('layouts.outlet')

@section('title', __('Edicion de Registro'))

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-1/2">
        @if (request('action') == 'delete' && $outlet)
        @can('delete', $outlet)
            <div class="bg-white shadow-md rounded-md p-4">
                <div class="text-xl text-gray-800 mb-4">{{ __('Eliminacion de Centro') }}</div>
                <div class="mb-4">
                    <label class="text-gray-600">{{ __('Nombre del Centro') }}</label>
                    <p>{{ $outlet->name }}</p>
                    <label class="text-gray-600">{{ __('Dirección') }}</label>
                    <p>{{ $outlet->address }}</p>
                    <label class="text-gray-600">{{ __('latitude') }}</label>
                    <p>{{ $outlet->latitude }}</p>
                    <label class="text-gray-600">{{ __('longitude') }}</label>
                    <p>{{ $outlet->longitude }}</p>
                    {!! $errors->first('outlet_id', '<span class="text-red-600" role="alert">:message</span>') !!}
                </div>
                <hr class="my-4">
                <div class="text-red-600">{{ __('Opciones de Eliminación') }}</div>
                <div class="flex justify-end mt-4">
                    <form method="POST" action="{{ route('outlets.destroy', $outlet) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('Confirma que desea eliminar?') }}&quot;)" class="del-form" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="outlet_id" type="hidden" value="{{ $outlet->id }}">
                        <button class="btn btn-primary ml-2">Confirmar</button>
                    </form>
                    <a href="{{ route('outlets.edit', $outlet) }}" class="btn btn-red ml-2">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="text-xl text-gray-800 mb-4">{{ __('Edicción del Registro') }}</div>
            <form method="POST" action="{{ route('outlets.update', $outlet) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="mb-4">
                    <label for="name" class="text-gray-600">{{ __('Nombre del Centro') }}</label>
                    <input id="name" type="text" class="form-input w-full{{ $errors->has('name') ? ' border-red-500' : '' }}" name="name" value="{{ old('name', $outlet->name) }}" required>
                    {!! $errors->first('name', '<span class="text-red-600" role="alert">:message</span>') !!}
                </div>
                <div class="mb-4">
                    <label for="address" class="text-gray-600">{{ __('Dirección') }}</label>
                    <textarea id="address" class="form-textarea w-full{{ $errors->has('address') ? ' border-red-500' : '' }}" name="address" rows="4" required>{{ old('address', $outlet->address) }}</textarea>
                    {!! $errors->first('address', '<span class="text-red-600" role="alert">:message</span>') !!}
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mr-4">
                        <label for="latitude" class="text-gray-600">{{ __('latitude') }}</label>
                        <input id="latitude" type="text" class="form-input w-full{{ $errors->has('latitude') ? ' border-red-500' : '' }}" name="latitude" value="{{ old('latitude', $outlet->latitude) }}" required>
                        {!! $errors->first('latitude', '<span class="text-red-600" role="alert">:message</span>') !!}
                    </div>
                    <div class="w-1/2">
                        <label for="longitude" class="text-gray-600">{{ __('longitude') }}</label>
                        <input id="longitude" type="text" class="form-input w-full{{ $errors->has('longitude') ? ' border-red-500' : '' }}" name="longitude" value="{{ old('longitude', $outlet->longitude) }}" required>
                        {!! $errors->first('longitude', '<span class="text-red-600" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div id="mapid" class="mb-4 h-64"></div>
                <div class="flex justify-end">
                    <button class="btn btn-primary ml-2">Guardar Cambios</button>

                    <a href="{{ route('outlets.show', $outlet) }}"  class="btn btn-danger ml-auto">{{ __('app.cancel') }}</a>
                    @can('delete', $outlet)
                        <a href="{{ route('outlets.edit', [$outlet, 'action' => 'delete']) }}" id="del-outlet-{{ $outlet->id }}" class="btn btn-danger ml-auto">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 300px; }
</style>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ $outlet->latitude }}, {{ $outlet->longitude }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Ubicación :  " + marker.getLatLng().toString())
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
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
@endpush
