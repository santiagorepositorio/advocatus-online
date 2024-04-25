@extends('layouts.outlet')

@section('content')
    <div class="card">
        <div class="card-body" id="mapid"></div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <style>
        #mapid {
            min-height: 600px;
        }
    </style>
@endsection
@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <script>
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(
        //         (position) => {
        //             const coords = {
        //                 lat: position.coords.latitude,
        //                 lng: position.coords.longitude,
        //             };
        //             var map = L.map('mapid').setView(coords, {{ config('leaflet.zoom_level') }});
        //             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //                 attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //             }).addTo(map);
        //             var markers = L.markerClusterGroup();

        //             axios.get('{{ route('api.outlets.index') }}')
        //                 .then(function(response) {
        //                     var marker = L.geoJSON(response.data, {
        //                         pointToLayer: function(geoJsonPoint, latlng) {
        //                             return L.marker(latlng).bindPopup(function(layer) {
        //                                 return layer.feature.properties.map_popup_content;
        //                             });
        //                         }
        //                     });
        //                     markers.addLayer(marker);
        //                 })
        //                 .catch(function(error) {
        //                     console.log(error);
        //                 });
        //             map.addLayer(markers);

        //             @can('user', App\Models\Outlet::class)

        //                 var theMarker;

        //                 map.on('click', function(e) {
        //                     let latitude = e.latlng.lat.toString().substring(0, 15);
        //                     let longitude = e.latlng.lng.toString().substring(0, 15);

        //                     if (theMarker != undefined) {
        //                         map.removeLayer(theMarker);
        //                     };

        //                     var popupContent = "Ubicación : " + latitude + ", " + longitude + ".";
        //                     popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude +
        //                         '&longitude=' + longitude + '">Agregar nueva ubicación</a>';

        //                     theMarker = L.marker([latitude, longitude]).addTo(map);
        //                     theMarker.bindPopup(popupContent)
        //                         .openPopup();
        //                 });
        //             @endcan
        //             console.log(coords);
        //         },
        //         () => {
        //             alert("Actualiza la version de tu navegador");
        //         }
        //     );
        // } else {
            // var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
            //     {{ config('leaflet.map_center_longitude') }}
            // ], {{ config('leaflet.zoom_level') }});
            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);
            // var markers = L.markerClusterGroup();

            // axios.get('{{ route('api.outlets.index') }}')
            //     .then(function(response) {
            //         var marker = L.geoJSON(response.data, {
            //             pointToLayer: function(geoJsonPoint, latlng) {
            //                 return L.marker(latlng).bindPopup(function(layer) {
            //                     return layer.feature.properties.map_popup_content;
            //                 });
            //             }
            //         });
            //         markers.addLayer(marker);
            //     })
            //     .catch(function(error) {
            //         console.log(error);
            //     });
            // map.addLayer(markers);

            // @can('user', App\Models\Outlet::class)

            //     var theMarker;

            //     map.on('click', function(e) {
            //         let latitude = e.latlng.lat.toString().substring(0, 15);
            //         let longitude = e.latlng.lng.toString().substring(0, 15);

            //         if (theMarker != undefined) {
            //             map.removeLayer(theMarker);
            //         };

            //         var popupContent = "Ubicación : " + latitude + ", " + longitude + ".";
            //         popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude +
            //             '&longitude=' + longitude + '">Agregar nueva ubicación</a>';

            //         theMarker = L.marker([latitude, longitude]).addTo(map);
            //         theMarker.bindPopup(popupContent)
            //             .openPopup();
            //     });
            // @endcan
        // }
        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
                {{ config('leaflet.map_center_longitude') }}
            ], {{ config('leaflet.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var markers = L.markerClusterGroup();

        axios.get('{{ route('api.outlets.index') }}')
            .then(function(response) {
                var marker = L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng).bindPopup(function(layer) {
                            return layer.feature.properties.map_popup_content;
                        });
                    }
                });
                markers.addLayer(marker);
            })
            .catch(function(error) {
                console.log(error);
            });
        map.addLayer(markers);

        @can('user', App\Models\Outlet::class)

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
        @endcan
    </script>
@endpush
