@extends('home')

@section('title', __('station.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Station Detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{__("Nom station en francais")}}</td><td>{{ $station->nom_fr }}</td></tr>
                        <tr><td>{{__("Nom station en arabe")}}</td><td>{{ $station->nom_ar }}</td></tr>
                        <tr><td>{{__("Adresse")}}</td><td>{{ $station->adresse }}</td></tr>
                        <tr><td>{{__("latitude")}}</td><td>{{ $station->latitude }}</td></tr>
                        <tr><td>{{__("longitude")}}</td><td>{{ $station->longitude }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $station)



       <a href="{{route('editstation',['id'=>$station->id])}}" id="edit-outlet-{{ $station->id }}" class="btn btn-warning">{{ __('Edit Station') }}</a>
                @endcan
                @if(auth()->check())
                    <a href="{{ route('indexstation') }}" class="btn btn-link">{{ __('Gestion des stations') }}</a>
                @else
                    <a href="{{ route('station_map.index') }}" class="btn btn-link">{{ __('back To Station List') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ trans('Location') }}</div>
            @if ($station->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('station.no_coordinate') }}</div>
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
    var map = L.map('mapid').setView([{{ $station->latitude }}, {{ $station->longitude }}], {{ config('leaflet.detail_zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([{{ $station->latitude }}, {{ $station->longitude }}]).addTo(map)
        .bindPopup('{!! $station->map_popup_content !!}');
</script>
@endpush
