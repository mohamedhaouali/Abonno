@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des station</h1>
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
                    <th>nombre</th>
                    <th>Nom station en francais </th>
                    <th>Nom station en arabe</th>
                    <th>lat</th>
                    <th>long</th>
                    <th>ligne</th>
                    @can('manage-users')
                        <th>Actions</th>
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






                        @can('edit-users')

                            <td>
                                <a href="{{route('editstation',['id'=>$station->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                    Modifier</a>

                                @endcan

                                @can('delete-users')

                                    <a onclick="return(confirm('sans regret ?'))"
                                       href="{{route('deletestation',['id'=>$station->id])}}"
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
