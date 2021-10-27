@extends('home')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter un client")}}</h1>

        </div>
        <form action="{{route('storeclient')}}" method="post" enctype="multipart/form-data">
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
                    <label for="cin">Cin</label>
                    <input type="number" class="form-control" id="cin" name="cin" value="{{old('cin')}}">
                </div>
                </div>



                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nomparent">{{__("Nom du parent")}}</label>
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
                        <label for="nom">{{__("Prix")}}</label>
                        <input type="text" class="form-control" id="prixtotale" name="prixtotale" value="{{old('prixtotale')}}">
                    </div>
                </div>




                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="file">{{__("Profile image")}}</label>
                    <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                    <img id="previexImg"  alt="" style="max-width:130px;margin-top:20px;"/>

                </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="clienttype_id">{{__("type des clients")}}</label>
                        <select class="form-control form-control-lg" id="clientstype_id" name="clientstype_id" >
                            @foreach($clientstypes as $clientstype)
                                <option {{ old('clientstype_id') == $clientstype->id ? "selected" : "" }}
                                        value="{{$clientstype->id}}">{{$clientstype->nom_fr}}</option>
                            @endforeach
                        </select>
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
                        <label for="classe_id">{{__("Classe")}}</label>
                        <select class="form-control form-control-lg" id="classe_id" name="classe_id" >
                            @foreach($classes as $classe)
                                <option {{ old('classe_id') == $classe->id ? "selected" : "" }}
                                        value="{{$classe->id}}">{{$classe->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




            </div>
              <button type="submit" class="btn btn-primary">Ajouter</button>



        </form>

        <script>

            function previewFile(input){
var file = $("input[type=file]").get(0).files[0];
if(file)
{

    var reader = new FileReader();
    reader.onload = function(){
        $("#previexImg").atr("src",reader.result);
    }
    reader.readAsDataURL(file)
}
            }
        </script>
    </main>
@endsection

