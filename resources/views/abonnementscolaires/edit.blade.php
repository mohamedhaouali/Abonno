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
                <h1 class="h2">Modifier un Abonnement Scolaire </h1>

            </div>

                <form action="{{route('updateabonnementscolaire',['id'=>$abonnementscolaire->id])}}" method="post" enctype="multipart/form-data">
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
                                            <label for="nom">Nom Abonnee</label>
                                            <input type="nom" class="form-control" id="nom" name="nom" value="{{$abonnementscolaire->nom}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="prenomabonne"> Prenom Abonnee </label>
                                            <input type="prenomabonne" class="form-control" id="prenomabonne" name="prenomabonne" value="{{$abonnementscolaire->prenomabonne}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">


                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="nomparent">Nom  du parent</label>
                                            <input type="nomparent" class="form-control" id="nomparent" name="nomparent" value="{{$abonnementscolaire->nomparent}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="prenomparent"> Prenom du parent</label>
                                            <input type="prenomparent" class="form-control" id="nameparent" name="prenomparent" value="{{$abonnementscolaire->prenomparent}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="datenaissance">Date du naissance</label>
                                            <input type="date" class="form-control" id="datenaissance" name="datenaissance" value="{{$abonnementscolaire->datenaissance}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" class="form-control" id="age" name="age" value="{{$abonnementscolaire->age}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-6">
                                        <div class="form-group">
                                            <label for="etudiant">Type Etudiant</label>
                                            <select class="form-control form-control-lg" id="etudiant" name="etudiant" >
                                                <option value="Etudiant">Etudiant</option>
                                                <option value="Eleve">Eleve</option>
                                                <option value="Formationpro">Formationpro</option>
                                            </select>
                                        </div>
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

                                        <label for="region_id">region</label>
                                        <select class="form-control form-control-lg" id="region_id" name="region_id" >
                                            @foreach($regions as $region)
                                                @if($abonnementscolaire->region && $abonnementscolaire->region->id == $region->id)
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
                                                @if($abonnementscolaire->municipalite && $abonnementscolaire->municipalite->id == $municipalite->id)
                                                    <option selected value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                                                @else
                                                    <option value="{{$municipalite->id}}">{{$municipalite->nom_ar}}</option>
                                                @endif

                                            @endforeach
                                        </select>



                                    </div>



                                    <div class="form-group mb-3 col-md-6">

                                        <label for="adresse">Adresse Abonne</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{$abonnementscolaire->adresse}}">
                                    </div>




                                    <div class="form-group mb-3 col-md-6">

                                        <label for="telephone">telephone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{$abonnementscolaire->telephone}}">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>




                    <div  class="col-lg-6" id="dvPassport" style="display: none">
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
                                        <div class="form-group">

                                            <label for="etudiant_id">etudiant</label>
                                            <select class="form-control form-control-lg" id="etudiant_id" name="etudiant_id" >
                                                @foreach($etudiants as $etudiant)
                                                    @if($abonnementscolaire->etudiant && $abonnementscolaire->etudiant->id == $etudiant->id)
                                                        <option selected value="{{$etudiant->id}}">{{$etudiant->nom}}</option>
                                                    @else
                                                        <option value="{{$etudiant->id}}">{{$etudiant->nom}}</option>
                                                    @endif

                                                @endforeach
                                            </select>

                                        </div>
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


                    <div class="col-lg-12">
                        <div class="card" style="border: 3px solid #e5e8eb !important;border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="header-title">{{__('Paiement')}}</h4>
                                <p class="sub-header"></p>
                                <div class="form-row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="periodeabonnement_id">Periode abonnement</label>
                                        <select class="form-control form-control-lg" id="periodeabonnement_id" name="periodeabonnement_id" >
                                            @foreach($periodeabonnements as $periodeabonnement)
                                                <option {{ old('periodeabonnement_id') == $periodeabonnement->id ? "selected" : "" }}
                                                        value="{{$periodeabonnement->id}}">{{$periodeabonnement->periode}}</option>
                                            @endforeach
                                        </select>

                                    </div>

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




                                </div>

                                <div class="row">

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="prixtotale">prixtotale</label>
                                        <input type="text" class="form-control" id="prixtotale" name="prixtotale" value="{{$abonnementscolaire->prixtotale}}">
                                    </div>


                                    <div class="form-group mb-3 col-md-6">

                                        <label for="typedepaiement_id">Methode paiement</label>
                                        <select class="form-control form-control-lg" id="typedepaiement_id" name="typedepaiement_id" >
                                            @foreach($typedepaiements as $typedepaiement)
                                                @if($abonnementscolaire->typedepaiement && $abonnementscolaire->typedepaiement->id == $typedepaiement->id)
                                                    <option selected value="{{$typedepaiement->id}}">{{$typedepaiement->nom_ar}}</option>
                                                @else
                                                    <option value="{{$typedepaiement->id}}">{{$typedepaiement->nom_ar}}</option>
                                                @endif

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="annee_id">annee</label>
                                        <select class="form-control form-control-lg" id="annee_id" name="annee_id" >
                                            @foreach($annees as $annee)
                                                @if($abonnementscolaire->annee && $abonnementscolaire->annee->id == $annee->id)
                                                    <option selected value="{{$annee->id}}">{{$annee->nom}}</option>
                                                @else
                                                    <option value="{{$annee->id}}">{{$annee->nom}}</option>
                                                @endif

                                            @endforeach
                                        </select>

                                    </div>




                                    <div class="form-group mb-3 col-md-6">

                                        <label for="station_id">station</label>
                                        <select class="form-control form-control-lg" id="station_id" name="station_id" >
                                            @foreach($stations as $station)
                                                @if($abonnementscolaire->station && $abonnementscolaire->station->id == $station->id)
                                                    <option selected value="{{$station->id}}">{{$station->nom_ar}}</option>
                                                @else
                                                    <option value="{{$station->id}}">{{$station->nom_ar}}</option>
                                                @endif

                                            @endforeach
                                        </select>

                                    </div>



                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="numero">Numero Mandat</label>
                                        <input type="number" class="form-control" id="numero" name="numero" value="{{$abonnementscolaire->numero}}">

                                    </div>

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="cartereference">Carte reference</label>
                                        <input type="number" class="form-control" id="cartereference" name="cartereference" value="{{$abonnementscolaire->cartereference}}">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="stationdebut">Station debut</label>
                                        <input type="text" class="form-control" id="stationdebut" name="stationdebut" value="{{$abonnementscolaire->stationdebut}}">

                                    </div>

                                    <div class="form-group mb-3 col-md-6">

                                        <label for="stationfin">Station fin</label>
                                        <input type="text" class="form-control" id="stationfin" name="stationfin" value="{{$abonnementscolaire->stationfin}}">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">

                                        <label for="file">Image</label>
                                        <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                                        <img id="previexImg" src="{{asset('images')}}/{{$abonnementscolaire->profileimage}}"
                                             alt="Profile Image" style="max-width:130px;margin-top:20px;"/>

                                    </div>
                                </div>


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->


                    <button type="submit" class="btn btn-success">Modifier</button>



            </form>
        </main>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#etudiant").change(function () {
                    if ($(this).val() == "Eleve") {
                        $("#dvPassport").show();
                    }

                    else if ($(this).val() == "Formationpro") {
                        $("#dvPassport").show();
                    }

                    else {
                        $("#dvPassport").hide();
                    }
                });
            });
        </script>




        <script type="text/javascript">
            function formatDate(date){
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');

            }

            function getAge(dateString){
                var birthdate = new Date().getTime();
                if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
                    // variable is undefined or null value
                    birthdate = new Date().getTime();
                }
                birthdate = new Date(dateString).getTime();
                var now = new Date().getTime();
                // now find the difference between now and the birthdate
                var n = (now - birthdate)/1000;
                if (n < 604800){ // less than a week
                    var day_n = Math.floor(n/86400);
                    if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
                        // variable is undefined or null
                        return '';
                    }else{
                        return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
                    }
                } else if (n < 2629743){ // less than a month
                    var week_n = Math.floor(n/604800);
                    if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
                        return '';
                    }else{
                        return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
                    }
                } else if (n < 31562417){ // less than 24 months
                    var month_n = Math.floor(n/2629743);
                    if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
                        return '';
                    }else{
                        return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
                    }
                }else{
                    var year_n = Math.floor(n/31556926);
                    if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
                        return year_n = '';
                    }else{
                        return year_n + ' '  + ' ';
                    }
                }
            }

            function getAgeVal(pid){
                var birthdate = formatDate(document.getElementById("datenaissance").value);
                var count = document.getElementById("datenaissance").value.length;
                if (count=='10'){
                    var age = getAge(birthdate);
                    var str = age;
                    var res = str.substring(0, 1);
                    if (res =='-' || res =='0'){
                        document.getElementById("datenaissance").value = "";
                        document.getElementById("age").value = "";
                        $('#datenaissance').focus();
                        return false;
                    }else{
                        document.getElementById("age").value = age;
                    }
                }else{
                    document.getElementById("age").value = "";
                    return false;
                }
            }
        </script>


        <script>
            function myFunction() {
                var x, text;

                // Get the value of the input field with id="numb"
                x = document.getElementById("age").value;

                // If x is Not a Number or less than one or greater than 10


                if (isNaN(x) || x < 1 || x > 35) {
                    text = "Age not valid";
                } else {
                    text = "Age  valide";
                }
                document.getElementById("demo").innerHTML = text;
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

