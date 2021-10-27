@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>

        </div>
        <form action="{{route('updateligne',['id'=>$ligne->id])}}" method="post" enctype="multipart/form-data">
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
                        <label for="nom_fr">{{__("Nom du ligne en francais")}}</label>
                        <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{$ligne->nom_fr}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nom_ar">{{__("Nom du ligne en arabe")}}</label>
                        <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{$ligne->nom_ar}}">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="num">{{__("Numero")}}</label>
                        <input type="numeric" class="form-control" id="num" name="num" value="{{$ligne->num}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="distance">{{__("Distance")}}</label>
                        <input type="numeric" class="form-control" id="distance" name="distance" value="{{$ligne->distance}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="prix">{{__("Prix")}}</label>
                        <input type="text" class="form-control" id="prix" name="prix" value="{{$ligne->prix}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="lignedebut">{{__("lignedebut")}}</label>
                        <input type="text" class="form-control" id="lignedebut" name="lignedebut" value="{{$ligne->lignedebut}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="lignefin">{{__("lignefin")}}</label>
                        <input type="text" class="form-control" id="lignedebut" name="lignefin" value="{{$ligne->lignefin}}">
                    </div>
                </div>


            </div>



            <button type="submit" class="btn btn-success">{{__("Modifier")}}</button>
        </form>
    </main>
@endsection

