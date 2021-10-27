@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__("Gestion des periode abonnement")}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">


            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Periode")}}</th>
                    <th>{{__("Date debut du semestre")}}</th>
                    <th>{{__("Date fin du semestre")}}</th>


                    <th>{{__("Actions")}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($periodeabonnements as $periodeabonnement)
                    <tr>

                        <td>{{$periodeabonnement->id}}</td>
                        <td>{{$periodeabonnement->periode}}</td>
                        <td>{{$periodeabonnement->datedebut}}</td>
                        <td>{{$periodeabonnement->datefin}}</td>



                     <td>
                            <a href="{{route('editperiodeabonnement',['id'=>$periodeabonnement->id])}}" class="btn btn-sm
                                btn-primary">
                              {{__("Modifier")}}</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteperiodeabonnement',['id'=>$periodeabonnement->id])}}"
                               class="btn btn-sm btn-outline-danger">   {{__("Supprimer")}}</a>
</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $periodeabonnements->links() !!}
        </div>
    </main>

@endsection
