@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des municipalite")}}</h1>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom municipalite en francais")}} </th>
                    <th>{{__("Nom municipalite en arabe")}}</th>
                    <th>{{__("Adresse")}}</th>
                    <th>{{__("regions")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($municipalites as $municipalite)
                    <tr>

                        <td>{{$municipalite->id}}</td>
                        <td>{{$municipalite->nom_fr}}</td>
                        <td>{{$municipalite->nom_ar}}</td>
                        <td>{{$municipalite->adresse}}</td>

                        <td>
                            {{ $municipalite->region->nom_fr}}
                        </td>


                     <td>
                            <a href="{{route('editmunicipalite',['id'=>$municipalite->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}}  </a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deletemunicipalite',['id'=>$municipalite->id])}}"
                               class="btn btn-sm btn-outline-danger">
                                {{__("Supprimer")}}</a>
</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $municipalites->links() !!}
        </div>
    </main>

@endsection
