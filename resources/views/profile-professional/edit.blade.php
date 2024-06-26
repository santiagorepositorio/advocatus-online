<x-profile-layout>
    <x-slot name="profile">
        {{ $profile->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">Informacion del Perfil</h1>
   
    <hr class="mt-2 mb-6">

    {!! Form::model($profile, [
        'route' => ['update.profile', $profile],
        'method' => 'put',
        'files' => true,
    ]) !!}
    @include('profile-professional.partials.form')
    <div class="flex justify-end">
        {{-- @if ($profile->status != 3) --}}
        {!! Form::submit('Actualizar Informacion', ['class' => ' btn btn-primary']) !!}
        {{-- @endif --}}

    </div>

    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/profile/form.js') }}"></script>
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
        <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
        <script src="https://unpkg.com/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>
 
        

        <script>
            var latitude = document.getElementById('latitude').value;
            var longitude = document.getElementById('longitude').value;


            if (latitude !== '' && longitude !== '') {
                var map = L.map('mapid').setView([{{ $profile->latitude }}, {{ $profile->longitude }}],
                    {{ config('leaflet.detail_zoom_level') }});
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                var marker = L.marker([{{ $profile->latitude }}, {{ $profile->longitude }}]).addTo(map);

            } else {
                var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }},
                    {{ request('longitude', config('leaflet.map_center_longitude')) }}
                ];
                var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                var marker = L.marker(mapCenter).addTo(map);
            }



            function updateMarker(lat, lng) {
                marker
                    .setLatLng([lat, lng])
                    .bindPopup("Tu Nueva Ubicación")
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


            // Botón para mostrar ubicación actual
            L.control.locate({
                position: 'topright', // Posición del botón
                strings: {
                    title: "Mostrar mi ubicación"
                }
            }).addTo(map);
        </script>


    </x-slot>
</x-profile-layout>
