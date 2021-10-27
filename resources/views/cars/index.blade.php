@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des Bus")}}</h1>
            <form class="form-group" method="POST" action="{{route('carsearch')}}">
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
                    <th>{{__("Nom du bus")}}</th>
                    <th>{{__("Marque")}}</th>
                    <th>{{__("Date du circulation")}}</th>
                    <th>{{__("nombre des places")}}</th>
                    <th>{{__("condition")}}</th>
                    <th>{{__("Comment")}}</th>
                    <th>{{__("Etat")}}</th>
                    @can('manage-users')
                    <th>{{__("Actions")}}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>

                        <td>{{$car->id}}</td>
                        <td>{{$car->nom}}</td>
                        <td>{{$car->marque}}</td>
                        <td>{{$car->date_circulation}}</td>
                        <td>{{$car->place_number}}</td>
                        <td>{{$car->condition}}</td>
                        <td>{{$car->comment}}</td>

                        <td>
                            {{ $car->etat->nom}}
                        </td>


                        @can('edit-users')
<td>
                            <a href="{{route('editcar',['id'=>$car->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}}</a>

    @endcan

    @can('delete-users')

                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deletecar',['id'=>$car->id])}}"
                               class="btn btn-sm btn-outline-danger"> {{__("Supprimer")}}</a>
</td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $cars->links() !!}
        </div>
    </main>

@endsection
