@extends('lignes.map')
@extends('home')

@section('content')
<?php $count=1; ?>
 @php($count=1)
<!-- styles !-->
<style>
    /* Popup box  */
    .hover_bkgr_fricc{
     background:rgba(0,0,0,.4);
     cursor:pointer;
     display:none;
     height:100%;
     position:fixed;
     text-align:center;
     top:0;
     width:100%;
     z-index:10000;
    }
     .hover_bkgr_fricc .helper{
     display:inline-block;
     height:100%;
     vertical-align:middle;
     }
     .hover_bkgr_fricc > div {
     background-color: #fff;
     box-shadow: 0px 0px 4px #555;
     display: inline-block;
     height: auto;
     max-width: 451px;
     min-height: 100px;
     vertical-align: middle;
     width: 60%;
     right: 70px;
     top: -150px;
     position: relative;
     border-radius: 8px;
     padding: 15px 5%;
    }
     .popupCloseButton {
     background-color: #fff;
     border: 3px solid #999;
     border-radius: 50px;
     cursor: pointer;
     display: inline-block;
     font-family: arial;
     font-weight: bold;
     position: absolute;
     top: -20px;
     right: -20px;
     font-size: 25px;
     line-height: 30px;
     width: 30px;
     height: 30px;
     text-align: center;
    }
     .popupCloseButton:hover {
     background-color: #ccc;
    }
     .trigger_popup_fricc {
     cursor: pointer;
     font-size: 20px;
     margin: 20px;
     display: inline-block;
     font-weight: bold;
    }

/* card style */
   .card {
      /* Add shadows to create the "card" effect */
     box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
     width: 400px;
     transition: 0.3s;
     border-radius: 5px;
     padding: 10px;
     margin-left: 30px;
    margin-top: 20px;
    }
    .btn1{
     margin-left: 25px;
    }
    .pull-left{
     margin-top: 12px;
     margin-left: 25px;
    }
 </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher la ligne</h2>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Numero")}}</strong>
                {{ $ligne->num }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Stations")}}</strong>
                <ul>
                    @foreach ($ligne->stations as $station)<i class="fas fa-arrow-right"> </i>
                         {{ $station->nom_fr}}
                     @endforeach
                  </ul>
            </div>
        </div>
        <div class="btn1">
            <a class="btn btn-success" href="{{route('editligne',['id'=>$ligne->id])}}"> {{__("Modifier")}}</a>
            <a class="btn btn-success " href="{{ route('indexligne') }}"> Back</a> <br><br>
             <strong>{{__("Nombre des stations")}} </strong> {{count($ligne->stations)}}
            <a class="trigger_popup_fricc">Afficher</a>
        </div>
        <div class="hover_bkgr_fricc">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">&times;</div>
                <p>Liste des stations<br /> </p>

                    <table class="table" >
                        @foreach ($ligne->stations as $station)
                    <tr >
                        <td><i class="fas fa-bus"></i></td>
                        <td>{{$station->nom_fr}} </td>
                        <td>{{$count}}</td>
                    </tr>
                    @php($count++)
                @endforeach </table>
            </div>
        </div>

    </div>

    </div>

    <div id="mapid"></div>
    @endsection
    @section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>

    <style>
        #mapid { height: 300px;
              width: 700px;
              left: 550px;
              bottom: 100px; }
    </style>
@endsection
@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
  $(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
       $('.hover_bkgr_fricc').show();
    });
    $('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});
    </script>

@endpush
