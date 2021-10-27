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

    <div id="wrapper">




        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">



                <!-- Tab panes -->


            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->


        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

        <!-- Dashboard 2 init -->
        <script src="../assets/js/pages/dashboard-2.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>


        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Ajouter un Abonnement Sociale</h1>

            </div>
            <form action="{{route('storeabonnementsociale')}}" method="post" enctype="multipart/form-data">
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
                                        <div class="form-group">
                                            <label for="annee_id">Annee</label>
                                            <select class="form-control form-control-lg" id="annee_id" name="annee_id" >
                                                @foreach($annees as $annee)
                                                    <option {{ old('annee_id') == $annee->id ? "selected" : "" }}
                                                            value="{{$annee->id}}">{{$annee->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="nom">Nom Abonnee</label>
                                            <input type="nom" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="prenom"> Prenom Abonnee </label>
                                            <input type="prenom" class="form-control" id="prenom" name="prenom" value="{{old('prenom')}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">


                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="nomparent">Nom  du parent</label>
                                            <input type="nomparent" class="form-control" id="nomparent" name="nomparent" value="{{old('nomparent')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="prenomparent"> Prenom du parent</label>
                                            <input type="prenomparent" class="form-control" id="nameparent" name="prenomparent" value="{{old('prenomparent')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="cin"> CIN</label>
                                            <input type="cin" class="form-control" id="cin" name="cin" value="{{old('cin')}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="datenaissance">Date du naissance</label>
                                            <input type="date" class="form-control" id="datenaissance"onkeyup="calculate_age()" name="datenaissance" value="{{old('datenaissance')}}">
                                            <p id="calculated_age"></p>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" class="form-control" id="age" name="age" value="{{old('age')}}">


                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">



                                    <div class="form-group mb-3 col-md-6">

                                        <div class="form-group">
                                            <label for="etudiant_id">Type Etudiant</label>
                                            <select class="form-control form-control-lg" id="etudiant_id" name="etudiant_id" >
                                                @foreach($etudiants as $etudiant)
                                                    <option {{ old('etudiant_id') == $etudiant->id ? "selected" : "" }}
                                                            value="{{$etudiant->id}}">{{$etudiant->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="button" class="btn btn-primary" id="show_menu" value="Afficher les donnees etudiants">
                                        <input type="button" class="btn btn-danger" id="hide_menu" value="Masquer les donnees etudiants ">
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-lg-6">
                        <div class="card" style="border: 3px solid #e5e8eb !important;cursor: pointer;border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="header-title">{{__('Informations Supplémentaires')}}</h4>
                                <p class="sub-header">{{__('lieu de résidence')}}</p>
                                <div class="form-row">

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="region_id">Region</label>
                                        <select class="form-control form-control-lg" id="region_id" name="region_id" >
                                            @foreach($regions as $region)
                                                <option {{ old('region_id') == $region->id ? "selected" : "" }}
                                                        value="{{$region->id}}">{{$region->nom_fr}}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group mb-3 col-md-6">

                                        <label for="region_id">Municipalite</label>
                                        <select class="form-control form-control-lg" id="municipalite_id" name="municipalite_id" >
                                            @foreach($municipalites as $municipalite)
                                                <option {{ old('municipalite_id') == $municipalite->id ? "selected" : "" }}
                                                        value="{{$municipalite->id}}">{{$municipalite->nom_fr}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group mb-3 col-md-6">

                                        <label for="adresse">Adresse Abonne</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse')}}">
                                    </div>




                                    <div class="form-group mb-3 col-md-6">

                                        <label for="telephone">telephone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone')}}">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div  class="col-lg-6">
                        <div class="list_container" style="display:none">
                        <div class="card" style="border: 3px solid #e5e8eb !important;border-radius: 25px;">

                            <div class="card-body">
                                <h4 class="header-title">{{__("Données d'étude")}}</h4>
                                <p class="sub-header"></p>

                                <div class="form-row">

                                    <div class="form-group mb-3 col-md-6">
                                        <label for="niveauscolaire_id">Niveau scolaire</label>
                                        <select class="form-control form-control-lg" id="niveauscolaire_id" name="niveauscolaire_id" >
                                            @foreach($niveauscolaires as $niveauscolaire)
                                                <option {{ old('niveauscolaire_id') == $niveauscolaire->id ? "selected" : "" }}
                                                        value="{{$niveauscolaire->id}}">{{$niveauscolaire->nom_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group mb-3 col-md-6">

                                        <label for="classe_id">Classe</label>
                                        <select class="form-control form-control-lg" id="classe_id" name="classe_id" >
                                            @foreach($classes as $classe)
                                                <option {{ old('classe_id') == $classe->id ? "selected" : "" }}
                                                        value="{{$classe->id}}">{{$classe->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group mb-3 col-md-6">
                                        <label for="etablissement_id">etablissement</label>
                                        <select class="form-control form-control-lg" id="etablissement_id" name="etablissement_id" >
                                            @foreach($etablissements as $etablissement)
                                                <option {{ old('etablissement_id') == $etablissement->id ? "selected" : "" }}
                                                        value="{{$etablissement->id}}">{{$etablissement->nom_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                </div>

                            </div> <!-- end col-->
                        </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card" style="border: 3px solid #e5e8eb !important;border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="header-title">{{__('Paiement')}}</h4>
                                <p class="sub-header"></p>
                                <div class="form-row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="payement_id">Periode abonnement</label>
                                        <select class="form-control form-control-lg" id="periodeabonnement_id" name="periodeabonnement_id" >
                                            @foreach($periodeabonnements as $periodeabonnement)
                                                <option {{ old('periodeabonnement_id') == $periodeabonnement->id ? "selected" : "" }}
                                                        value="{{$periodeabonnement->id}}">{{$periodeabonnement->periode}}</option>
                                            @endforeach
                                        </select>

                                    </div>





                                </div>


                                <div class="row">



                                    <div class="form-group mb-3 col-md-6">

                                        <label for="ligne_id">Ligne</label>
                                        <select class="form-control form-control-lg" id="ligne_id" name="ligne_id" >
                                            @foreach($lignes as $ligne)
                                                <option {{ old('ligne_id') == $ligne->id ? "selected" : "" }}
                                                        value="{{$ligne->id}}">{{$ligne->num}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="prixtotale">prixtotale</label>
                                        <input type="text" class="form-control" id="prixtotale" name="prixtotale" value="{{old('prixtotale')}}">
                                    </div>


                                    <div class="form-group mb-3 col-md-6">

                                        <label for="typedepaiement_id">Methode paiement</label>
                                        <select class="form-control form-control-lg" id="typedepaiement_id" name="typedepaiement_id" >
                                            @foreach($typedepaiements as $typedepaiement)
                                                <option {{ old('typedepaiements_id') == $typedepaiement->id ? "selected" : "" }}
                                                        value="{{$typedepaiement->id}}">{{$typedepaiement->nom_ar}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="numero">Numero</label>
                                        <input type="number" class="form-control" id="numero" name="numero" value="{{old('numero')}}">

                                    </div>

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="cartereference">Carte reference</label>
                                        <input type="number" class="form-control" id="cartereference" name="cartereference" value="{{old('cartereference')}}">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="stationdebut">Station debut</label>
                                        <input type="text" class="form-control" id="stationdebut" name="stationdebut" value="{{old('stationdebut')}}">

                                    </div>

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="stationfin">Station fin</label>
                                        <input type="text" class="form-control" id="stationfin" name="stationfin" value="{{old('stationfin')}}">
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="station_id">Station</label>
                                        <select class="form-control form-control-lg" id="station_id" name="station_id" >
                                            @foreach($stations as $station)
                                                <option {{ old('stations_id') == $station->id ? "selected" : "" }}
                                                        value="{{$station->id}}">{{$station->nom_ar}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="file">Image</label>
                                        <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                                        <img id="previexImg"  alt="" style="max-width:130px;margin-top:20px;"/>


                                    </div>
                                </div>


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->


                    <button type="submit" class="btn btn-primary">Ajouter</button>



            </form>
        </main>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#etudiant").change(function () {
                    if ($(this).val() == "Eleve") {
                        $("#dvPassport").show();
                    }

                    else {
                        $("#dvPassport").hide();
                    }
                });
            });
        </script>

        <script>
            function calculate_age()
            {
                var datenaissance = new Date(document.getElementById("datenaissance").value);




                var datenaissance_day = datenaissance.getDate();
                var datenaissance_month = datenaissance.getMonth();
                var datenaissance_year = datenaissance.getFullYear();

                var today_date = new Date();
                var today_day = today_date.getDate();
                var today_month = today_date.getMonth();
                var today_year = today_date.getFullYear();

                var calculated_age = 0;

                if (today_month > datenaissance_month) calculated_age = today_year - datenaissance_year;
                else if (today_month == datenaissance_month)
                {
                    if (today_day >= datenaissance_day) calculated_age = today_year - datenaissance_year;
                    else calculated_age = today_year - birth_date_year - 1;
                }
                else calculated_age = today_year - datenaissance_year - 1;

                var output_value = calculated_age;
                document.getElementById("calculated_age").innerHTML = calculated_age;
            }

        </script>
        <script>
            function check(){
                var nbr;
                nbr = Number(document.getElementById("age").value);
                if(nbr < 35)
                {
                    alert("Age valide");
                }
                else
                {
                    alert("Age invalide");
                }
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#show_menu").click(function () {
                    $( ".list_container" ).show(3000);
                });
                $("#hide_menu").click(function () {
                    $( ".list_container" ).hide(3000);
                });
            });
        </script>
@endsection

