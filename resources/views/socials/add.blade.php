@extends('home')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> {{__("Ajouter un social")}}</h1>

        </div>
        <form action="{{route('storesocial')}}" method="post" enctype="multipart/form-data">
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
                        <label for="nom">   {{__("Nom du parent")}}</label>
                        <input type="text" class="form-control" id="nomparent" name="nomparent" value="{{old('nomparent')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenomparent">{{__("Prenom du parent")}}</label>
                        <input type="text" class="form-control" id="prenomparent" name="prenomparent" value="{{old('prenomparent')}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomabonne">{{__("Nom abonne")}}</label>
                        <input type="text" class="form-control" id="nomabonne" name="nomabonne" value="{{old('nomabonne')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenomabonne">{{__("Prenom abonne")}}</label>
                        <input type="text" class="form-control" id="prenomabonne" name="prenomabonne" value="{{old('prenomabonne')}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="cin">{{__("Cin")}}</label>
                        <input type="number" class="form-control" id="cin" name="cin" value="{{old('cin')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="ligne_id">{{__("ligne")}}</label>
                        <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                            @foreach($lignes as $ligne)
                                <option {{ old('ligne_id') == $ligne->id ? "selected" : "" }}
                                        value="{{$ligne->id}}">{{$ligne->num}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="classe_id">{{__("classe")}}</label>
                        <select class="form-control form-control-lg" id="classe_id" name="classe_id" >
                            @foreach($classes as $classe)
                                <option {{ old('classe_id') == $classe->id ? "selected" : "" }}
                                        value="{{$classe->id}}">{{$classe->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>






                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nombrenfants">{{__("Nombre Enfants")}}</label>

                        <input type="number" class="form-control" id="enfant" name="nombrenfants" value="">Number of members: (max. 10)<br />
                        <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
                        <div id="container"/>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>

        </form>

        <script type='text/javascript'>
            function addFields(){
                // Number of inputs to create
                var number = document.getElementById("enfant").value;
                // Container <div> where dynamic content will be placed
                var container = document.getElementById("container");
                // Clear previous contents of the container
                while (container.hasChildNodes()) {
                    container.removeChild(container.lastChild);
                }
                for (i=0;i<number;i++){
                    // Append a node with a random text
                    container.appendChild(document.createTextNode("nomenfant" + (i+1)));
                    // Create an <input> element, set its type and name attributes
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "nomenfant" + (i+1);
                    container.appendChild(input);
                    // Append a line break
                    container.appendChild(document.createElement("br"));
                }
            }
        </script>
    </main>
@endsection

