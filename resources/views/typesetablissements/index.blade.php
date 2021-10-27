@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des types etablissement")}}</h1>


        </div>


        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom types etablissement en francais")}}</th>
                    <th>{{__("Nom types etablissement en arabe")}}</th>
                    <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($typesetablissements as $typesetablissement)
                    <tr>

                        <td>{{$typesetablissement->id}}</td>
                        <td>{{$typesetablissement->nom_fr}}</td>
                        <td>{{$typesetablissement->nom_ar}}</td>




<td>
                            <a href="{{route('edittypesetablissement',['id'=>$typesetablissement->id])}}" class="btn btn-sm
                                btn-primary">{{__("Modifier")}}
                                </a>

                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deletetypesetablissement',['id'=>$typesetablissement->id])}}"
                               class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $typesetablissements->links() !!}
        </div>
    </main>

@endsection
