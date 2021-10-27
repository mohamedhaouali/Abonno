@extends('home')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ajouter un etudiant</h1>

        </div>
        <form action="{{route('storestudydetail')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <label for="name">Nom du etudiant</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
                </div>


                </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="level_id">Niveaux</label>
                <select class="form-control form-control-lg" id="level_id" name="level_id" >
                    @foreach($levels as $level)
                        <option {{ old('level_id') == $level->id ? "selected" : "" }}
                                value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="etablishment_id">etablishment</label>
                <select class="form-control form-control-lg" id="etablishment_id" name="etablishment_id" >
                    @foreach($etablishments as $etablishment)
                        <option {{ old('etablishment_id') == $etablishment->id ? "selected" : "" }}
                                value="{{$etablishment->id}}">{{$etablishment->name_fr}}</option>
                    @endforeach
                </select>
            </div>


              <button type="submit" class="btn btn-primary">Ajouter</button>



        </form>
    </main>
@endsection

