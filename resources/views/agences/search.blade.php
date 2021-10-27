
@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des Agences</h1>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>Nom en francais</th>
                    <th>Nom en arabe</th>
                    <th>Code </th>
                    <th>Adresse</th>
                    <th>Municipalite</th>
                    @can('manage-users')
                    <th>Actions</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($agences as $agence)
                    <tr>

                        <td>{{$agence->id}}</td>
                        <td>{{$agence->nom_fr}}</td>
                        <td>{{$agence->nom_ar}}</td>
                        <td>{{$agence->code}}</td>
                        <td>{{$agence->address}}</td>




                        <td>
                            {{ $agence->municipalite->nom_fr}}
                        </td>


                        @can('edit-users')
                            <td>
                                <a href="{{route('editagence',['id'=>$agence->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                    Modifier</a>
                                @endcan

                                @can('delete-users')
                                    <a onclick="return(confirm('sans regret ?'))"
                                       href="{{route('deleteagence',['id'=>$agence->id])}}"
                                       class="btn btn-sm btn-outline-danger">Supprimer</a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
