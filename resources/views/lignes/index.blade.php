@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> {{__("Gestion des lignes")}}</h1>

            <form class="form-group" method="POST" action="{{route('lignesearch')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="query" class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('recherche par numero') }}</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>{{__("Nom du ligne en arabe")}}</th>
                    <th>{{__("Nom du ligne en francais")}}</th>
                    <th>{{__("Numero")}}</th>
                    <th>{{__("Distance")}}</th>
                    <th>{{__("Prix")}}</th>
                    <th>{{__("lignedebut")}}</th>
                    <th>{{__("lignefin")}}</th>
                    <th>{{__("Stations")}}</th>
                    <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($lignes as $ligne)
                        <tr>
                        <td>{{$ligne->id}}</td>
                        <td>{{$ligne->nom_fr}}</td>
                        <td>{{$ligne->nom_ar}}</td>
                        <td>{{$ligne->num}}</td>
                        <td>{{$ligne->distance}}</td>
                        <td>{{$ligne->prix}}</td>
                        <td>{{$ligne->lignedebut}}</td>
                        <td>{{$ligne->lignefin}}</td>
                        <td>
                            <ul>
                                @foreach ($ligne->stations as $station)
                                    <li> {{ $station->nom_fr}} </li>
                                @endforeach
                            </ul>
                        </td>
                        @can('edit-users')

<td>
                            <a href="{{route('editligne',['id'=>$ligne->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}}    </a>
    <a class="btn btn-info" href="{{ route('showligne',$ligne->id) }}"> {{__("Voir")}}


        @endcan

    @can('delete-users')


                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteligne',['id'=>$ligne->id])}}"
                               class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
</td>

@endcan

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
