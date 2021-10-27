@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des stations")}}</h1>
            <form class="form-group" method="POST" action="{{route('stationsearch')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="query" class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('search') }}</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nombre")}}</th>
                    <th>{{__("Nom station en francais")}}</th>
                    <th>{{__("Nom station en arabe")}}</th>
                    <th>{{__("latitude")}}</th>
                    <th>{{__("longitude")}}</th>
                    <th>{{__("Adresse")}}</th>
                    @can('manage-users')
                    <th>{{__("Actions")}}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($stations as $station)
                    <tr>

                        <td>{{$station->id}}</td>
                        <td>{{$station->nombre}}</td>
                        <td>{{$station->nom_fr}}</td>
                        <td>{{$station->nom_ar}}</td>
                        <td>{{$station->latitude}}</td>
                        <td>{{$station->longitude}}</td>
                        <th>{{$station->adresse}}</th>



  @can('edit-users')

                     <td>
                            <a href="{{route('editstation',['id'=>$station->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}}    </a>

                         <a href="{{route('showstation',['id'=>$station->id])}}" class="btn btn-sm
                                btn-soft-success">{{__("Voir")}}
                         </a>

  @endcan

  @can('delete-users')

                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deletestation',['id'=>$station->id])}}"
                               class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
</td>

 @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $stations->links() !!}
        </div>
    </main>

@endsection
