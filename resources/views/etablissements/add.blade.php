@extends('home')
@section('content')
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter un Etablissement")}}</h1>

        </div>
        <form action="{{route('storeetablissement')}}" method="post" enctype="multipart/form-data">
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
                    <label for="nom_fr"> {{__("Nom Établissement en francais")}}</label>
                    <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{old('nom_fr')}}">
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar">{{__("Nom Établissement en arabe")}}</label>
                    <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{old('nom_ar')}}">
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="adresse">{{__("Adresse")}}</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="typesetablissement_id">{{__("type Établissement")}} </label>
                    <select class="form-control form-control-lg" id="typesetablissement_id" name="typesetablissement_id" >
                        @foreach($typesetablissements as $typesetablissement)
                            <option {{ old('typesetablissement_id') == $typesetablissement->id ? "selected" : "" }}
                                    value="{{$typesetablissement->id}}">{{$typesetablissement->nom_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="municipalite_id">{{__("Municipalite")}}</label>
                    <select class="form-control form-control-lg" id="municipalite_id" name="municipalite_id" >
                        @foreach($municipalites as $municipalite)
                            <option {{ old('municipalite_id') == $municipalite->id ? "selected" : "" }}
                                    value="{{$municipalite->id}}">{{$municipalite->nom_fr}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="niveauscolaire_id">{{__("Niveaux scolaire")}}</label>
                    <select class="form-control form-control-lg" id="niveauscolaire_id" name="niveauscolaire_id" >
                        @foreach($niveauscolaires as $niveauscolaire)
                            <option {{ old('niveauscolaire_id') == $niveauscolaire->id ? "selected" : "" }}
                                    value="{{$niveauscolaire->id}}">{{$niveauscolaire->nom_ar}}</option>
                        @endforeach
                    </select>
                </div>



                </div>

            <div class="form-group row">

            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>
                </div>
            </div>


        </form>
    </main>
@endsection

