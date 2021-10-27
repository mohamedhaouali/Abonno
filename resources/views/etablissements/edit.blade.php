@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier une Etablissement")}}</h1>

        </div>
        <form action="{{route('updateetablissement',['id'=>$etablissement->id])}}" method="post" enctype="multipart/form-data">
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
                    <label for="nom_fr">{{__("Nom Établissement en francais")}}</label>
                    <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{$etablissement->nom_fr}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar">{{__("Nom Établissement en arabe")}}</label>
                    <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{$etablissement->nom_ar}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="adresse">{{__("Adresse")}}</label>
                        <input type="text" class="form-control" id="adresse" name=" adresse" value="{{$etablissement->adresse}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="typesetablissement_id">{{__("type Établissement")}}</label>
                    <select class="form-control form-control-lg" id="typesetablissement_id" name="typesetablissement_id" >
                        @foreach($typesetablissements as $typesetablissement)
                            @if($etablissement->typesetablissement && $etablissement->typesetablissement->id == $typesetablissement->id)
                                <option selected value="{{$typesetablissement->id}}">{{$typesetablissement->nom_ar}}</option>
                            @else
                                <option value="{{$typesetablissement->id}}">{{$typesetablissement->nom_fr}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="municipalite_id">{{__("Municipalite")}}</label>
                    <select class="form-control form-control-lg" id="municipalite_id" name="municipalite_id" >
                        @foreach($municipalites as $municipalite)
                            @if($etablissement->municipalite && $etablissement->municipalite->id == $municipalite->id)
                                <option selected value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                            @else
                                <option value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="niveauscolaire_id">{{__("Niveaux scolaire")}}</label>
                    <select class="form-control form-control-lg" id="niveauscolaire_id" name="niveauscolaire_id" >
                        @foreach($niveauscolaires as $niveauscolaire)
                            @if($etablissement->niveauscolaire && $etablissement->niveauscolaire->id == $niveauscolaire->id)
                                <option selected value="{{$niveauscolaire->id}}">{{$niveauscolaire->nom_ar}}</option>
                            @else
                                <option value="{{$niveauscolaire->id}}">{{$niveauscolaire->nom_ar}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                </div>



</div>





            <button type="submit" class="btn btn-success">{{__("Modifier")}}</button>
        </form>
    </main>
@endsection

