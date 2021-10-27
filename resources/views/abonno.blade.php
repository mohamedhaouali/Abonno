@extends('home')

@section('content')
    <div class="row">

            <div class="col-xs-12 col-sm-4">
               <a href="{{ route('sidebarabonnementscolaire') }}" class="list-group-item font-weight-bold list-group-item-action" >

                    Abonnement Scolaire

                </a>
            </div>
            <div class="col-xs-6 col-sm-4">
                <a href="{{ route('sidebarabonnementcivile') }}" class="list-group-item font-weight-bold list-group-item-action">
                    Abonnement   Civile
                </a>
            </div>
            <div class="col-xs-6 col-sm-4">
                <a href="{{ route('sidebarabonnementsociale') }}" class="list-group-item font-weight-bold list-group-item-action">
                    Abonnement Sociale
                </a>
            </div>



    </div>
@endsection
