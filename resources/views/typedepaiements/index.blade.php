@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des type de paiement")}}</h1>


        </div>



        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th> {{__("Nom type de paiement en francais")}}</th>
                    <th>{{__("Nom type de paiement en arabe")}}</th>


                    <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($typedepaiements as $typedepaiement)
                    <tr>

                        <td>{{$typedepaiement->id}}</td>
                        <td>{{$typedepaiement->nom_fr}}</td>
                        <td>{{$typedepaiement->nom_ar}}</td>






<td>
                            <a href="{{route('edittypedepaiement',['id'=>$typedepaiement->id])}}" class="btn btn-sm
                                btn-primary">
                                {{__("Modifier")}}</a>

            <a onclick="return(confirm('sans regret ?'))"
            href="{{route('deletetypedepaiement',['id'=>$typedepaiement->id])}}"
           class="btn btn-sm btn-outline-danger"> {{__("Supprimer")}}</a>
</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $typedepaiements->links() !!}
        </div>
    </main>

@endsection
