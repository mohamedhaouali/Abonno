@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>

        </div>
        <form action="{{route('updatestation',['id'=>$station->id])}}" method="post" enctype="multipart/form-data">
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
                    <label for="nombre">{{__("Nombre")}}</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$station->nombre}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_fr">{{__("Nom station en francais")}}</label>
                    <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{$station->nom_fr}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar">{{__("Nom station en arabe")}}</label>
                    <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{$station->nom_ar}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="lat">{{__("latitude")}}</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$station->latitude}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="longitude">{{__("longitude")}}</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$station->longitude}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="adresse">{{__("Adresse")}}</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{$station->adresse}}">
                    </div>
                </div>


            </div>




            <button type="submit" class="btn btn-success">{{__("Modifier")}}</button>
        </form>
    </main>
@endsection


@push('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin="">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        var mapCenter = [{{ $station->latitude }}, {{ $station->longitude }}];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.detail_zoom_level') }});
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
