@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <form action="{{route('updateclient',['id'=>$client->id])}}" method="post" enctype="multipart/form-data">
            @csrf
   <input type="hidden" name="id" value="{{$client->id}}" />
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
                    <input type="text" class="form-control" id="nomabonne" name="nomabonne" value="{{$client->nomabonne}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenom">{{__("Prenom abonne")}}</label>
                        <input type="text" class="form-control" id="prenomabonne" name="prenomabonne" value="{{$client->prenomabonne}}">
                    </div>
                </div>



                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="cin">CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin" value="{{$client->cin}}">
                    </div>
                </div>




            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <label for="nomparent">{{__("Nom du parent")}}</label>
                <input type="text" class="form-control" id="nomparent" name="nomparent" value="{{$client->nomparent}}">
            </div>
            </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prenomparent">{{__("Prenom du parent")}}</label>
                        <input type="text" class="form-control" id="prenomparent" name="prenomparent" value="{{$client->prenomparent}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="file">{{__("Profile image")}}</label>
                        <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                        <img id="previexImg" src="{{asset('images')}}/{{$client->profileimage}}"
                             alt="Profile Image" style="max-width:130px;margin-top:20px;"/>

                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="customerstype_id">{{__("type des clients")}}</label>
                        <select class="form-control form-control-lg" id="clientstype_id" name="clientstype_id" >
                            @foreach($clientstypes as $clientstype)
                                @if($client->clientstype && $client->clientstype->id == $clientstype->id)
                                    <option selected value="{{$clientstype->id}}">{{$clientstype->nom_fr}}</option>
                                @else
                                    <option value="{{$clientstype->id}}">{{$clientstype->nom_fr}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="ligne_id">{{__("ligne")}}</label>
                        <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                            @foreach($lignes as $ligne)
                                @if($client->ligne && $client->ligne->id == $ligne->id)
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
                        <label for="prixtotale">{{__("Prix")}}</label>
                        <input type="text" class="form-control" id="prixtotale" name="prixtotale" value="{{$client->prixtotale}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="classe_id">{{__("Classe")}}</label>
                        <select class="form-control form-control-lg" id="classe_id" name="classe_id" >
                            @foreach($classes as $classe)
                                @if($client->classe && $client->classe->id == $classe->id)
                                    <option selected value="{{$classe->id}}">{{$classe->nom}}</option>
                                @else
                                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
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

