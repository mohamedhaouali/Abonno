@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des Niveaux</h1>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th> Nom</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($levels as $level)
                    <tr>

                        <td>{{$level->id}}</td>
                        <td>{{$level->nom}}</td>




                        <td>
                            <a href="{{ route('levels.edit', $level->id)}}" class="btn btn-sm
                                btn-primary">Voir /
                                Modifier</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{ route('levels.destroy', $level->id)}}"
                               class="btn btn-sm btn-outline-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
