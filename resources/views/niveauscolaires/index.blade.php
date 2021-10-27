@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion Niveau scolaire")}}</h1>


        </div>



        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom niveau scolaire en francais")}}</th>
                    <th>{{__("Nom niveau scolaire en arabe")}}</th>

                    <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($niveauscolaires as $niveauscolaire)
                    <tr>

                        <td>{{$niveauscolaire->id}}</td>
                        <td>{{$niveauscolaire->nom_fr}}</td>
                        <td>{{$niveauscolaire->nom_ar}}</td>





<td>
                            <a href="{{route('editniveauscolaire',['id'=>$niveauscolaire->id])}}" class="btn btn-sm
                                btn-primary">{{__("Modifier")}}</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteniveauscolaire',['id'=>$niveauscolaire->id])}}"
                               class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $niveauscolaires->links() !!}
        </div>
    </main>

@endsection
