@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des √Čtablissement")}}</h1>
            <form class="form-group" method="POST" action="{{route('etablissementsearch')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="query" class="form-control">
                    </div>
                    <div class="col">
   <button type="submit" class="btn btn-success">{{ __('Recherche par nom') }}</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom √Čtablissement en francais")}} </th>
                    <th>{{__("Nom √Čtablissement en arabe")}}</th>
                    <th>{{__("Adresse")}}</th>
                    <th>{{__("type √Čtablissement")}}</th>
                    <th>{{__("Municipalite")}}</th>
                    <th>{{__("Niveaux scolaire")}}</th>
                    @can('manage-users')
                    <th>{{__("Actions")}}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($etablissements as $etablissement)
                    <tr>

                        <td>{{$etablissement->id}}</td>
                        <td>{{$etablissement->nom_fr}}</td>
                        <td>{{$etablissement->nom_ar}}</td>
                        <td>{{$etablissement-> adresse}}</td>
                        <td>
                            {{ $etablissement->typesetablissement->nom_ar}}
                        </td>

                        <td>
                            {{ $etablissement->municipalite->nom_fr}}
                        </td>

                        <td>
                            {{ $etablissement->niveauscolaire->nom_ar}}
                        </td>


                        @can('edit-users')
                     <td>
                            <a href="{{route('editetablissement',['id'=>$etablissement->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}} </a>

                         @endcan

                         @can('delete-users')
                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteetablissement',['id'=>$etablissement->id])}}"
                               class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
</td>

                        @endcan

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $etablissements->links() !!}
        </div>
    </main>

@endsection
