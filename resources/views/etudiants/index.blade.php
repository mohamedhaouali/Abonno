@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des Etudiants")}}</h1>


        </div>



        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th> {{__("Type")}}</th>

                    <th> {{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>

                        <td>{{$etudiant->id}}</td>
                        <td>{{$etudiant->nom}}</td>





<td>
                            <a href="{{route('editetudiant',['id'=>$etudiant->id])}}" class="btn btn-sm
                                btn-primary">
                               {{__("Modifier")}}</a>

                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteetudiant',['id'=>$etudiant->id])}}"
                               class="btn btn-sm btn-outline-danger"> {{__("Supprimer")}}</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
