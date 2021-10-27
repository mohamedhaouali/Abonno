@extends('home')
@section('content')


    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter")}}</h1>

        </div>
        <form action="{{route('storeregion')}}" method="post" enctype="multipart/form-data">
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
                    <label for="nom_fr">{{__("Nom region en francais")}}</label>
                    <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="{{old('nom_fr')}}">
                </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom_ar"> {{__("Nom region en arabe")}}</label>
                    <input type="text" class="form-control" id="nom_ar" name="nom_ar" value="{{old('nom_ar')}}">
                </div>
                </div>




            </div>

                    <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>


        </form>
    </main>
@endsection

