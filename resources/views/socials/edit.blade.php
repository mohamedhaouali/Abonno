@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>

        </div>
        <form action="{{route('updatesocial',['id'=>$social->id])}}" method="post" enctype="multipart/form-data">
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
                        <label for="nom">{{__("Nom du parent")}}</label>
                        <input type="text" class="form-control" id="nomparent" name="nomparent" value="{{$social->nomparent}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenomparent">{{__("Prenom du parent")}}</label>
                        <input type="text" class="form-control" id="prenomparent" name="prenomparent" value="{{$social->prenomparent}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomabonne">{{__("Nom abonne")}}</label>
                        <input type="text" class="form-control" id="nomabonne" name="nomabonne" value="{{$social->nomabonne}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenomabonne">{{__("Prenom abonne")}}</label>
                        <input type="text" class="form-control" id="prenomabonne" name="prenomabonne" value="{{$social->prenomabonne}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="number">{{__("Cin")}}</label>
                        <input type="number" class="form-control" id="cin" name="cin" value="{{$social->cin}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="ligne_id">{{__("ligne")}}</label>
                        <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                            @foreach($lignes as $ligne)
                                @if($social->ligne && $social->ligne->id == $ligne->id)
                                    <option selected value="{{$ligne->id}}">{{$ligne->nom_ar}}</option>
                                @else
                                    <option value="{{$ligne->id}}">{{$ligne->nom_ar}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="classe_id">{{__("classe")}}</label>
                        <select class="form-control form-control-lg" id="classe_id" name="classe_id" >
                            @foreach($classes as $classe)
                                @if($social->classe && $social->classe->id == $classe->id)
                                    <option selected value="{{$classe->id}}">{{$classe->nom}}</option>
                                @else
                                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>





                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nombrenfants">{{__("nombre enfants")}}</label>
                        <input type="number" class="form-control" id="nombrenfants" name="nombrenfants" value="{{$social->nombrenfants}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant1">{{__("Nom enfant 1")}}</label>
                        <input type="text" class="form-control" id="nomenfant1" name="nomenfant1" value="{{$social->nomenfant1}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant2">{{__("Nom enfant 2")}}</label>
                        <input type="text" class="form-control" id="nomenfant1" name="nomenfant2" value="{{$social->nomenfant2}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant3">{{__("Nom enfant 3")}}</label>
                        <input type="text" class="form-control" id="nomenfant3" name="nomenfant3" value="{{$social->nomenfant3}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant4">{{__("Nom enfant 4")}}</label>
                        <input type="text" class="form-control" id="nomenfant4" name="nomenfant4" value="{{$social->nomenfant4}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant5">{{__("Nom enfant 5")}}</label>
                        <input type="text" class="form-control" id="nomenfant5" name="nomenfant5" value="{{$social->nomenfant5}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant6">{{__("Nom enfant 6")}}</label>
                        <input type="text" class="form-control" id="nomenfant5" name="nomenfant6" value="{{$social->nomenfant6}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomenfant7">{{__("Nom enfant 7")}}</label>
                        <input type="text" class="form-control" id="nomenfant7" name="nomenfant7" value="{{$social->nomenfant7}}">
                    </div>
                </div>

            </div>



                <button type="submit" class="btn btn-success">{{__("Modifier")}}</button>
        </form>
    </main>
@endsection

