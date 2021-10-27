@extends('home')


@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    {{--    <link href="{{asset('assets/libs/croppie/croppie.css')}}" rel="stylesheet" type="text/css" />--}}
    <link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <style>
        /*.card{*/
        /*    border: 1px #00000061 solid!important;*/
        /*}*/
        html{
            direction:ltr!important;
        }
        .header-title{
            text-align: center!important;
            font-size: 20px!important;
        }
        .sub-header{
            text-align: center!important;
        }
        .form-control{
            border: 1px solid #636465!important;
        }
        .disableCard{
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier une Abonnement Civile</h1>


        </div>
        <form action="{{route('updateabonnementcivile',['id'=>$abonnementcivile->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <div class="row">

                <div class="col-lg-6">
                    <div class="card" style="border: 3px solid #e5e8eb !important;border-radius: 25px;">
                        <div class="card-body">

                            <h4 class="header-title">{{__('Informations Génerales')}}</h4>
                            <p class="sub-header"></p>


                            <div class="form-row">
                                <div class="form-group mb-3 col-md-6">

                                    <label for="annee_id">annee</label>
                                    <select class="form-control form-control-lg" id="annee_id" name="annee_id" >
                                        @foreach($annees as $annee)
                                            @if($abonnementcivile->annee && $abonnementcivile->annee->id == $annee->id)
                                                <option selected value="{{$annee->id}}">{{$annee->nom}}</option>
                                            @else
                                                <option value="{{$annee->id}}">{{$annee->nom}}</option>
                                            @endif

                                        @endforeach
                                    </select>


                                </div>


                            </div>





                            <div class="form-row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="name">Nom  Abonnee</label>
                                    <input type="nom" class="form-control" id="nom" name="nom" value="{{$abonnementcivile->nom}}">
                                </div>




                                <div class="form-group mb-3 col-md-6">

                                    <label for="prenom">Prenom  Abonnee</label>
                                    <input type="prenom" class="form-control" id="prenom" name="prenom" value="{{$abonnementcivile->prenom}}">



                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group mb-3 col-md-6">

                                    <label for="cin">Cin</label>
                                    <input type="number" class="form-control" id="cin" name="cin" value="{{$abonnementcivile->cin}}">

                                </div>





                                <div class="form-group mb-3 col-md-6">

                                    <label for="datenaissance">Date du naissance</label>
                                    <input type="date" class="form-control" id="datenaissance" name="datenaissance" value="{{$abonnementcivile->datenaissance}}">
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>

                <div class="col-lg-6">
                    <div class="card" style="border: 3px solid #e5e8eb !important;cursor: pointer;border-radius: 25px;">
                        <div class="card-body">
                            <h4 class="header-title">{{__('Informations Supplémentaires')}}</h4>
                            <p class="sub-header">{{__('lieu de résidence')}}</p>

                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">


                                    <label for="region_id">region</label>
                                    <select class="form-control form-control-lg" id="region_id" name="region_id" >
                                        @foreach($regions as $region)
                                            @if($abonnementcivile->region && $abonnementcivile->region->id == $region->id)
                                                <option selected value="{{$region->id}}">{{$region->nom_ar}}</option>
                                            @else
                                                <option value="{{$region->id}}">{{$region->nom_ar}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label for="municipalite_id">municipalite</label>
                                    <select class="form-control form-control-lg" id="municipalite_id" name="municipalite_id" >
                                        @foreach($municipalites as $municipalite)
                                            @if($abonnementcivile->municipalite && $abonnementcivile->municipalite->id == $municipalite->id)
                                                <option selected value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                                            @else
                                                <option value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">


                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{$abonnementcivile->adresse}}">

                                </div>

                                <div class="form-group mb-3 col-md-6">

                                    <label for="telephone">telephone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{$abonnementcivile->telephone}}">
                                </div>


                            </div>

                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">

                                    <label for="companie_id">companie</label>
                                    <select class="form-control form-control-lg" id="companie_id" name="companie_id" >
                                        @foreach($companies as $companie)
                                            @if($abonnementcivile->companie && $abonnementcivile->companie->id == $companie->id)
                                                <option selected value="{{$companie->id}}">{{$companie->nom_ar}}</option>
                                            @else
                                                <option value="{{$companie->id}}">{{$companie->nom_ar}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>






                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->


                <div class="col-lg-6">
                    <div class="card" style="border: 3px solid #e5e8eb !important;cursor: pointer;border-radius: 25px;">
                        <div class="card-body">
                            <h4 class="header-title">{{__('Paiement')}}</h4>

                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">

                                    <label for="periodeabonnement_id">periodeabonnement</label>
                                    <select class="form-control form-control-lg" id="periodeabonnement_id" name="periodeabonnement_id" >
                                        @foreach($periodeabonnements as $periodeabonnement)
                                            @if($abonnementcivile->periodeabonnement && $abonnementcivile->periodeabonnement->id == $periodeabonnement->id)
                                                <option selected value="{{$periodeabonnement->id}}">{{$periodeabonnement->periode}}</option>
                                            @else
                                                <option value="{{$periodeabonnement->id}}">{{$periodeabonnement->periode}}</option>
                                            @endif

                                        @endforeach
                                    </select>





                                </div>






                            </div>

                            <div class="form-row">




                                <div class="form-group mb-3 col-md-6">
                                    <label for="ligne_id">ligne</label>
                                    <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                                        @foreach($lignes as $ligne)
                                            @if($abonnementcivile->ligne && $abonnementcivile->ligne->id == $ligne->id)
                                                <option selected value="{{$ligne->id}}">{{$ligne->num}}</option>
                                            @else
                                                <option value="{{$ligne->id}}">{{$ligne->num}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>




                            </div>


                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">

                                    <label for="prixtotale">prixtotale</label>
                                    <input type="text" class="form-control" id="prixtotale" name="prixtotale" value="{{$abonnementcivile->prixtotale}}">
                                </div>




                                <div class="col-xs-6 col-sm-6 col-md-6">

                                    <label for="typedepaiement_id">Methode paiement</label>
                                    <select class="form-control form-control-lg" id="typedepaiement_id" name="typedepaiement_id" >
                                        @foreach($typedepaiements as $typedepaiement)
                                            @if($abonnementcivile->typedepaiement && $abonnementcivile->typedepaiement->id == $typedepaiement->id)
                                                <option selected value="{{$typedepaiement->id}}">{{$typedepaiement->nom_ar}}</option>
                                            @else
                                                <option value="{{$typedepaiement->id}}">{{$typedepaiement->nom_ar}}</option>
                                            @endif

                                        @endforeach
                                    </select>

                                </div>




                            </div>

                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">


                                    <label for="numero">numero</label>
                                    <input type="number" class="form-control" id="numero" name="numero" value="{{$abonnementcivile->numero}}">

                                </div>

                                <div class="form-group mb-3 col-md-6">

                                    <label for="cartereference">Carte reference</label>
                                    <input type="number" class="form-control" id="cartereference" name="cartereference" value="{{$abonnementcivile->cartereference}}">

                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group mb-3 col-md-6">

                                    <label for="stationdebut">Station debut</label>
                                    <input type="text" class="form-control" id="stationdebut" name="stationdebut" value="{{$abonnementcivile->stationdebut}}">

                                </div>

                                <div class="form-group mb-3 col-md-6">

                                    <label for="stationfin">Station fin</label>
                                    <input type="text" class="form-control" id="stationfin" name="stationfin" value="{{$abonnementcivile->stationfin}}">
                                </div>

                            </div>






                            <div class="form-row">

                                <div class="form-group mb-3 col-md-6">



                                    <label for="station_id">station</label>
                                    <select class="form-control form-control-lg" id="station_id" name="station_id" >
                                        @foreach($stations as $station)
                                            @if($abonnementcivile->station && $abonnementcivile->station->id == $station->id)
                                                <option selected value="{{$station->id}}">{{$station->nom_ar}}</option>
                                            @else
                                                <option value="{{$station->id}}">{{$station->nom_ar}}</option>
                                            @endif

                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="file">Image</label>
                                        <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                                        <img id="previexImg" src="{{asset('images')}}/{{$abonnementcivile->profileimage}}"
                                             alt="Profile Image" style="max-width:130px;margin-top:20px;"/>

                                    </div>
                                </div>




                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->



                    <button type="submit" class="btn btn-success">Modifier</button>



        </form>
    </main>
@endsection

