@extends('stations.map')
@extends('home')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter")}}</h1>

        </div>
        <form action="{{route('storestation')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="number"> {{__("Nombre")}}</label>
                        <input type="number" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nom_fr">{{__("Nom station en francais")}}</label>
                        <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{old('nom_fr')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nom_ar">{{__("Nom station en arabe")}}</label>
                        <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{old('nom_ar')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="latitude">{{__("latitude")}}</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{old('latitude')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="longitude">{{__("longitude")}}</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{old('longitude')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="adresse">{{__("Adresse")}}</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse')}}">
                    </div>
                </div>


            </div>


            <br> <br>
            <div id="mapid"></div>
            <br><br>
            <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>



        </form>
    </main>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker(mapCenter).addTo(map);
        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Your station location :  " + marker.getLatLng().toString())
                .openPopup();
            return false;
        };
        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 20);
            let longitude = e.latlng.lng.toString().substring(0, 20);
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
