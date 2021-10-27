@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des Annee")}}</h1>


        </div>



        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th> {{__("Annee")}}</th>

                    <th> {{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($annees as $annee)
                    <tr>

                        <td>{{$annee->id}}</td>
                        <td>{{$annee->nom}}</td>




<td>
                            <a href="{{route('editannee',['id'=>$annee->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                Modifier</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteannee',['id'=>$annee->id])}}"
                               class="btn btn-sm btn-outline-danger">Supprimer</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $annees->links() !!}
        </div>
    </main>

@endsection
