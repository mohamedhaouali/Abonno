<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title> ABonno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico')}}">



    <!-- Plugins css -->
    <link href="{{ asset('asset/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />



    <link href="{{ asset('asset/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />



    <!-- App css -->
    <link href="{{ asset('asset/css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />

    <link href=" {{ asset('asset/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />


    <link href="{{ asset('asset/css/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('asset/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{ asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body data-layout-mode="horizontal" >

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">


                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('asset/images/flags/us.jpg')}}" alt="user-image" height="16">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">




                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('asset/images/flags/spain.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('asset/images/flags/russia.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                            </h5>
                        </div>



                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">




                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 60px;height: 60px; padding: 10px; margin: 0px; ">
                        @endif
                        <span class="pro-user-name ml-1">
                                   {{ auth()->user()->firstname . ' ' . auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenue !</h6>
                        </div>

                        <!-- item-->
                        <a class="tooltipped" href="{{ route('profile.edit') }}" data-position="bottom" data-tooltip="Voir mon compte client">
                            <i class="fe-user"></i>
                            <span>Mon compte</span>

                        </a>

                        <a class="tooltipped" href="{{ route('profile.edit') }}" data-position="bottom" data-tooltip="Voir mon compte client">
                            <i class="fe-user"></i>
                            <span>Image</span>

                        </a>



                        <div class="dropdown-divider"></div>

                        <a href="{{ route('home3') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Image</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('deconnexion') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span> D??connexion</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="#" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('asset/images/logo-sm.png')}}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                    <span class="logo-lg">
                                <img src="{{ asset('asset/images/logo-dark.png')}}" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                </a>


            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <div class="topnav shadow-lg">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-grid mr-1"></i> dashboard <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                <a href="{{route('dashboard')}}" class="dropdown-item"><i class="fe-calendar mr-1"></i>tableau de bord Abonnement scolaires</a>
                                <a href="{{route('dashboard1')}}" class="dropdown-item"><i class="fe-calendar mr-1"></i>tableau de bord Abonnement civiles</a>
                                <a href="{{route('dashboard2')}}" class="dropdown-item"><i class="fe-calendar mr-1"></i>tableau de bord Abonnement sociales</a>
                            </div>
                        </li>

                        @can('manage2-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-grid mr-1"></i> Agences <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    @can('manage2-users')
                                        <a href="{{route('agences.create')}}" class="dropdown-item"><i class="fe-calendar mr-1"></i> Ajout Agences</a>
                                    @endcan
                                    <a href="{{route('agences.index')}}" class="dropdown-item"><i class="fe-calendar mr-1"></i> Liste des Agences</a>


                                </div>
                            </li>

                        @endcan

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-package mr-1"></i> Client <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Liste des clients <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                        @can('manage-users')
                                            <a href="{{route('addclient')}}" class="dropdown-item">Ajout client</a>
                                        @endcan
                                        <a href="{{route('indexclient')}}" class="dropdown-item">Liste des clients</a>

                                    </div>


                                </div>

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Liste des sociales <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                        <a href="{{route('addsocial')}}" class="dropdown-item">Ajout Sociales</a>

                                        <a href="{{route('index1social')}}" class="dropdown-item">Liste des Sociales</a>

                                    </div>


                                </div>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-sidebar mr-1"></i> Abonnement <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                @can('manage1-users')
                                    <a href="{{route('abonno')}}" class="dropdown-item">Ajout Abonnement </a>
                                @endcan

                                <a href="{{route('listeabonno')}}" class="dropdown-item">Liste des Abonnements</a>

                            </div>
                        </li>
                        @can('manage2-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-package mr-1"></i> Lignes <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Liste des lignes <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            @can('manage-users')
                                                <a href="{{route('addligne')}}" class="dropdown-item">Ajout Ligne </a>
                                            @endcan
                                            <a href="{{route('indexligne')}}" class="dropdown-item">Liste des lignes</a>

                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Liste des stations <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            @can('manage-users')
                                                <a href="{{route('addstation')}}" class="dropdown-item">Ajout Station </a>
                                            @endcan
                                            <a href="{{route('indexstation')}}" class="dropdown-item">Liste des Stations</a>

                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Liste des bus <div class="arrow-down"></div>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            @can('manage-users')
                                                <a href="{{route('addcar')}}" class="dropdown-item">Ajout Bus </a>
                                            @endcan
                                            <a href="{{route('indexcar')}}" class="dropdown-item">Liste des bus</a>

                                        </div>
                                    </div>
                        @endcan

                        @can('manage2-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-sidebar mr-1"></i> Etablissements  <div class="arrow-down"></div>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-layout">

                                    <a href="{{route('addetablissement')}}" class="dropdown-item">Ajout etablishment </a>

                                    <a href="{{route('indexetablissement')}}" class="dropdown-item">Liste des etablishments</a>

                                </div>
                            </li>
                        @endcan


                        @can('manage-users')

                        @endcan


                        @can('manage-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-sidebar mr-1"></i> Utilisateurs  <div class="arrow-down"></div>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                    <a href="{{ route('admin.users.create') }}" class="dropdown-item">Creer utilisateurs</a>
                                    <a href="{{ route('admin.users.index') }}" class="dropdown-item">Liste utilisateurs</a>



                                </div>
                            </li>
                        @endcan


                        @can('manage2-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-package mr-1"></i> Parametres <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Liste des Compagnie <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('companies.create')}}" class="dropdown-item">Ajout Compagnie</a>

                                            <a href="{{route('companies.index')}}" class="dropdown-item">Liste des Compagnie</a>

                                        </div>


                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            types de clients <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('clientstypes.create')}}" class="dropdown-item">Ajout Type Client</a>

                                            <a href="{{route('clientstypes.index')}}" class="dropdown-item">Liste des Type Client</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Type etablissement <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addtypesetablissement')}}" class="dropdown-item">Ajout types etablissement</a>

                                            <a href="{{route('indextypesetablissement')}}" class="dropdown-item">Liste des types etablissement</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Etat Bus <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('etats.create')}}" class="dropdown-item">Ajout Etats Bus </a>

                                            <a href="{{route('etats.index')}}" class="dropdown-item">Liste Etat Bus</a>

                                        </div>


                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Niveaux scolaire <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addniveauscolaire')}}" class="dropdown-item">Ajout Niveau scolaire </a>

                                            <a href="{{route('indexniveauscolaire')}}" class="dropdown-item">Liste Niveau scolaire</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Municipalite <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addmunicipalite')}}" class="dropdown-item">Ajout Municipalite </a>

                                            <a href="{{route('indexmunicipalite')}}" class="dropdown-item">Liste Municipalite</a>

                                        </div>


                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Periode Abonnement <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addperiodeabonnement')}}" class="dropdown-item">Ajout Periode Abonnement </a>

                                            <a href="{{route('indexperiodeabonnement')}}" class="dropdown-item">Liste Periode Abonnement</a>

                                        </div>


                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Type du Paiement <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addtypedepaiement')}}" class="dropdown-item">Ajout Type du Paiement </a>

                                            <a href="{{route('indextypedepaiement')}}" class="dropdown-item">Liste Type du Paiement</a>

                                        </div>


                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Region <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addregion')}}" class="dropdown-item">Ajout Region </a>

                                            <a href="{{route('indexregion')}}" class="dropdown-item">Liste Regions</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            type Abonnement <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('subscriptionstypes.create')}}" class="dropdown-item">Ajout type Abonnement</a>

                                            <a href="{{route('subscriptionstypes.index')}}" class="dropdown-item">Liste type Abonnement</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Etudiant <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addetudiant')}}" class="dropdown-item">Ajout Etudiant</a>

                                            <a href="{{route('indexetudiant')}}" class="dropdown-item">Liste Etudiant</a>

                                        </div>


                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Classe <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addclasse')}}" class="dropdown-item">Ajout Classe</a>

                                            <a href="{{route('indexclasse')}}" class="dropdown-item">Liste Classe</a>

                                        </div>


                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Annee <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                            <a href="{{route('addannee')}}" class="dropdown-item">Ajout Annee</a>

                                            <a href="{{route('indexannee')}}" class="dropdown-item">Liste Annee</a>

                                        </div>


                                    </div>




                                </div>
                            </li>

                        @endcan

                        @can('manage2-users')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-sidebar mr-1"></i> Import  <div class="arrow-down"></div>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                    <a href="{{ route('indexclientimport') }}" class="dropdown-item">Client</a>
                                    <a href="{{ route('indexcompanieimport') }}" class="dropdown-item">Compagnie</a>
                                    <a href="{{ route('indexsocialimport') }}" class="dropdown-item">Sociale</a>
                                    <a href="{{ route('indexligneimport') }}" class="dropdown-item"> Ligne</a>
                                    <a href="{{ route('indexstationimport') }}" class="dropdown-item"> Station</a>
                                    <a href="{{ route('indexetablissementimport') }}" class="dropdown-item"> Etablissements</a>
                                    <a href="{{ route('indexregionimport') }}" class="dropdown-item">Regions </a>
                                    <a href="{{ route('indexmunicipaliteimport') }}" class="dropdown-item"> Municipalite </a>
                                    <a href="{{ route('indexabonnementscolaireimport') }}" class="dropdown-item"> Abonnement scolaire </a>

                                    <a href="{{ route('indexabonnementcivileimport') }}" class="dropdown-item">Abonnement civiles </a>

                                    <a href="{{ route('indexabonnementsocialeimport') }}" class="dropdown-item">Abonnement sociales </a>


                                </div>
                            </li>

                        @endcan


                    </ul> <!-- end navbar-->
                </div> <!-- end .collapsed-->
            </nav>

            <div class="card-body">
                Image User
                <form action="{{route('home3')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <input type="submit" value="Upload">
                </form>
            </div>
        </div> <!-- end container-fluid -->
    </div> <!-- end topnav-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title"></h4>
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- end page title -->




            </div>
            <!-- end row-->




        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>document.write(new Date().getFullYear())</script> &copy; -pr??sent , <a href="http://www.next.tn/">Next Consult </a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('asset/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{ asset('asset/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('asset/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{ asset('asset/libs/selectize/js/standalone/selectize.min.js')}}"></script>

<!-- Dashboar 1 init js-->
<script src="{{ asset('asset/js/pages/dashboard-1.init.js')}}"></script>

<!-- App js-->
<script src="{{ asset('asset/js/app.min.js')}}"></script>
@yield('script')
</body>
</html>
