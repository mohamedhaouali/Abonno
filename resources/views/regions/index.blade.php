@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des Regions")}}</h1>

            <form class="form-group" method="POST" action="{{route('regionsearch')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="query" class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('Recherche') }}</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom region en francais")}}</th>
                    <th>{{__("Nom region en arabe")}}</th>


                    <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($regions as $region)
                    <tr>

                        <td>{{$region->id}}</td>
                        <td>{{$region->nom_fr}}</td>
                        <td>{{$region->nom_ar}}</td>




<td>
                            <a href="{{route('editregion',['id'=>$region->id])}}" class="btn btn-sm
                                btn-primary">
                               {{__(" Modifier")}}</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteregion',['id'=>$region->id])}}"
                               class="btn btn-sm btn-outline-danger"> {{__("Supprimer")}}</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $regions->links() !!}
        </div>
    </main>

@endsection
