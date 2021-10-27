@extends('home')

@section('content')
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier un etudiant</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

                <button class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    Nouveau
                </button>
            </div>
        </div>
        <form action="{{route('updatestudydetail',['id'=>$studydetail->id])}}" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="name" name="name" value="{{$studydetail->name}}">
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="level_id">Niveaux</label>
                    <select class="form-control form-control-lg" id="level_id" name="level_id" >
                        @foreach($levels as $level)
                            @if($studydetail->level && $studydetail->level->id == $level->id)
                                <option selected value="{{$level->id}}">{{$level->name}}</option>
                            @else
                                <option value="{{$level->id}}">{{$level->name}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="etablishment_id">etablishment</label>
                    <select class="form-control form-control-lg" id="etablishment_id" name="etablishment_id" >
                        @foreach($etablishments as $etablishment)
                            @if($studydetail->etablishment && $studydetail->etablishment->id == $etablishment->id)
                                <option selected value="{{$etablishment->id}}">{{$etablishment->name_fr}}</option>
                            @else
                                <option value="{{$etablishment->id}}">{{$etablishment->name_fr}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>







                <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </main>
@endsection

