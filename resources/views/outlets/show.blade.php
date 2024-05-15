@extends('layouts.outlet')

@section('title', __('outlet.detail'))

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white shadow-md rounded-md">
        <div class="bg-gray-200 px-4 py-2 rounded-t-md">Detalle del registro - <b>{{ $outlet->category->name }}</b></div>
        <div class="p-4">
            <table class="w-full table-fixed">
                <tbody>
                    <tr><td class="w-1/3">Nombre del Centro</td><td class="w-2/3">{{ $outlet->name }}</td></tr>
                    <tr><td>Email o Web</td><td>{{ $outlet->email }}</td></tr>
                    <tr><td>Contacto</td><td>{{ $outlet->phone }}</td></tr>
                    <tr><td>Ciudad</td><td>{{ $outlet->city }}</td></tr>
                    <tr><td>Dirección</td><td>{{ $outlet->address }}</td></tr>
                    <tr><td>Latitude</td><td>{{ $outlet->latitude }}</td></tr>
                    <tr><td>Longitude</td><td>{{ $outlet->longitude }}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="bg-gray-200 px-4 py-2 rounded-b-md flex justify-end gap-4">
            @can('update', $outlet)
                <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-red">EDITAR</a>
            @endcan
            @if(auth()->check())
                <a href="{{ route('outlets.index') }}" class="btn btn-primary">Ver Lista de registros</a>
            @else
                <a href="{{ route('outlet_map.index') }}" class="btn btn-primary">Ver Mapa</a>
            @endif
        </div>
    </div>
    <div class="bg-white shadow-md rounded-md">
        <div class="bg-gray-200 px-4 py-2 rounded-t-md">Mapa</div>
        <div class="p-4">
            @if ($outlet->coordinate)
            <div id="mapid" class="h-64 md:h-auto z-0"></div>
            @else
            <div>{{ __('outlet.no_coordinate') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection

@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map)
        .bindPopup('{!! $outlet->map_popup_content !!}');
</script>
@endpush

