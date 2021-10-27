@extends('home')
@section('content')
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Ajouter")}}</h1>

        </div>
        <form action="{{route('storeperiodeabonnement')}}" method="post" enctype="multipart/form-data">
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
                        <label for="periode"> {{__("Periode")}}</label>
                        <input type="text" class="form-control" id="periode" name="periode" value="{{old('periode')}}">
                    </div>
                </div>




                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="datedebut">{{__("Date debut du semestre")}}</label>
                        <input type="date" class="form-control" id="datedebut" name="datedebut" value="{{old('datedebut')}}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="datefin">{{__("Date fin du semestre")}}  </label>
                        <input type="date" class="form-control" id="datefin" name="datefin" value="{{old('datefin')}}">
                    </div>
                </div>




            </div>



              <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>



        </form>
    </main>
@endsection

