@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier")}}</h1>

        </div>
        <form action="{{route('updateniveauscolaire',['id'=>$niveauscolaire->id])}}" method="post" enctype="multipart/form-data">
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
                        <label for="nom_fr">{{__("Nom niveau scolaire en francais")}}</label>
                        <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{$niveauscolaire->nom_fr}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nom_ar">{{__("Nom niveau scolaire en arabe")}}</label>
                        <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{$niveauscolaire->nom_ar}}">
                    </div>
                </div>

            </div>




                <button type="submit" class="btn btn-success">{{__("Modifier")}}</button>
        </form>
    </main>
@endsection

