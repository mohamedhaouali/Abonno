@extends('home')
@section('content')
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter")}}</h1>

        </div>


        <form action="{{route('storeligne')}}" method="post" enctype="multipart/form-data">
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
                        <label for="nom_fr"> {{__("Nom du ligne en francais")}}</label>
                        <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{old('nom_fr')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar">{{__("Nom du ligne en arabe")}}</label>
                    <input type="nom_ar" class="form-control" id="nom_ar" name="nom_ar" value="{{old('nom_ar')}}">
                </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="num">{{__("Numero")}}</label>
                    <input type="text" class="form-control" id="num" name="num" value="{{old('num')}}">
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="distance">{{__("Distance")}}</label>
                    <input type="text" class="form-control" id="distance" name="distance" value="{{old('distance')}}">
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prix">{{__("Prix")}}</label>
                        <input type="text" class="form-control" id="prix" name="prix" value="{{old('prix')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="lignedebut">{{__("lignedebut")}}</label>
                        <input type="text" class="form-control" id="lignedebut" name="lignedebut" value="{{old('lignedebut')}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="lignefin">{{__("lignefin")}}</label>
                        <input type="text" class="form-control" id="lignefin" name="lignefin" value="{{old('lignefin')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <strong>{{__("Stations")}}</strong>
                    <select name="stations[]" id="choices-multiple-remove-button" placeholder="Select Station" multiple>
                        @foreach ($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->nom_fr }}</option>
                        @endforeach
                    </select> </div>

            </div>




            <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>


        </form>
    </main>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount:15,
                searchResultLimit:15,
                renderChoiceLimit:15
            });
        });
        </script>
@endsection

