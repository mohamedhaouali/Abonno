@extends('home')

@section('content')
    <div class="row">

            <div class="col-xs-12 col-sm-4">
               <a href="{{ route('indexabonnementscolaire') }}" class="list-group-item font-weight-bold list-group-item-action" >

                Liste   Abonnement Scolaire
                </a>
            </div>
            <div class="col-xs-6 col-sm-4">
                <a href="{{ route('indexabonnementcivile') }}" class="list-group-item font-weight-bold list-group-item-action">
                    Liste    Abonnement   Civile
                </a>
            </div>
            <div class="col-xs-6 col-sm-4">
                <a href="{{ route('indexabonnementsociale') }}" class="list-group-item font-weight-bold list-group-item-action">
                    Liste    Abonnement Sociale
                </a>
            </div>



    </div>
@endsection
