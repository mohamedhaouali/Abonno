@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Modifier une bus")}}</h1>

        </div>
        <form action="{{route('updatecar',['id'=>$car->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="nom">{{__("Nom du bus")}}</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$car->nom}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="cin">{{__("Marque")}}</label>
                    <input type="text" class="form-control" id="marque" name="marque" value="{{$car->marque}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="date_circulation">{{__("Date du circulation")}}</label>
                    <input type="birthday" class="form-control" id="date_circulation" name="date_circulation" value="{{$car->date_circulation}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="place_number">{{__("nombre des places")}}</label>
                        <input type="text" class="form-control" id="place_number" name="place_number" value="{{$car->place_number}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="condition">{{__("condition")}}</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="{{$car->condition}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="comment">{{__("Comment")}}</label>
                        <input type="textarea" class="form-control" id="comment" name="comment" value="{{$car->comment}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="ligne_id">{{__("ligne")}}</label>
                    <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                        @foreach($lignes as $ligne)
                            @if($car->ligne && $car->ligne->id == $ligne->id)
                                <option selected value="{{$ligne->id}}">{{$ligne->num}}</option>
                            @else
                                <option value="{{$ligne->id}}">{{$ligne->num}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="etat_id">{{__("Etat")}}</label>
                        <select class="form-control form-control-lg" id="etat_id" name="etat_id" >
                            @foreach($etats as $etat)
                                @if($car->etat && $car->etat->id == $etat->id)
                                    <option selected value="{{$etat->id}}">{{$etat->nom}}</option>
                                @else
                                    <option value="{{$etat->id}}">{{$etat->nom}}</option>
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

