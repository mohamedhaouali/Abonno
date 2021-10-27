@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>

        </div>
        <form action="{{route('updatemunicipalite',['id'=>$municipalite->id])}}" method="post" enctype="multipart/form-data">
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
                    <label for="nom_fr">{{__("Nom municipalite en francais")}}</label>
                    <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{$municipalite->nom_fr}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar">{{__("Nom municipalite en arabe")}}</label>
                    <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{$municipalite->nom_ar}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="adresse">{{__("Adresse")}}</label>
                        <input type="text" class="form-control" id=" adresse" name=" adresse" value="{{$municipalite->adresse}}">
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="region_id">{{__("regions")}}</label>
                    <select class="form-control form-control-lg" id="region_id" name="region_id" >
                        @foreach($regions as $region)
                            @if($municipalite->region && $municipalite->region->id == $region->id)
                                <option selected value="{{$region->id}}">{{$region->nom_fr}}</option>
                            @else
                                <option value="{{$region->id}}">{{$region->nom_fr}}</option>
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

