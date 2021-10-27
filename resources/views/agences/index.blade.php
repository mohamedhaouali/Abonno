@extends('home')



@section('content')
    <!-- Start Content-->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Srts</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Agences')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Liste des Agences')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('Liste des Agences')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card border">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <a href="{{route('agences.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i>{{__('Ajouter une Agence')}}</a>
                            </div>

                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-striped dt-responsive nowrap w-100" id="customers-datatable">
                                <thead>
                                <tr>
                                    <th>{{__('id')}}</th>
                                    <th>{{__('Nom Agence en francais')}}</th>
                                    <th>{{__('Nom Agence en arabe')}}</th>
                                    <th>{{__('Code')}}</th>
                                    <th>{{__('Adresse')}}</th>
                                    <th>{{__('municipalité')}}</th>
                                    <th>{{__('nombre utilisateurs')}}</th>
                                    <th style="width: 50px;">{{__("Action")}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($agences as $agence)
                                    <tr>

                                        <td>{{$agence->id}}</td>
                                        <td>{{$agence->nom_fr}}</td>
                                        <td>{{$agence->nom_ar}}</td>
                                        <td>{{$agence->code}}</td>
                                        <td>{{$agence->address}}</td>

                                        <td>
                                            {{ $agence->municipalite->nom_fr}}
                                        </td>

                                        <td><div style="display: flex ; flex-wrap: wrap">
                                                {{count($agence->users)}}
                                                @foreach($agence->users as $ag)
                                                    <a href="{{route('admin.users.show',$ag->id) }}" class="">
                                                        <div class="img_avatar" style="display: none  ">
                                                            <img src={{ asset('images/unnamed.png') }} width="50px">
                                                        </div>
                                                    </a>
                                                @endforeach
                                                <button  class="btn btn-secondary btn-circle m-1 more" >
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>

                                        </td>


                                        @can('edit-users')
                                            <td>
                                                <a href="{{route('edit',['id'=>$agence->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                                    Modifier</a>
                                                <a href="{{route('show',['id'=>$agence->id])}}" class="btn btn-sm
                                btn-success">
                                                    Afficher</a>


                                                @endcan

                                                @can('delete-users')
                                                    <a onclick="return(confirm('sans regret ?'))"
                                                       href="{{route('deleteagence',['id'=>$agence->id])}}"
                                                       class="btn btn-sm btn-outline-danger">Supprimer</a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>







        <!-- end row -->
        <!-- Danger Alert Modal -->
        <div id="danger-alert-modal" class="delete modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-wrong h1 text-white"></i>
                            <h4 class="mt-2 text-white">Suppression !</h4>
                            <p class="mt-3 text-white">Cette Action est irreversible</p>
                            <button id="delete" type="button" class="btn btn-light my-2" data-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Danger Alert Modal -->
        <div id="block-alert-modal" class="block modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-wrong h1 text-white"></i>
                            <h4 class="mt-2 text-white">Blockage !</h4>
                            <p class="mt-3 text-white">Cette Action est irreversible</p>
                            <button id="block" type="button" class="btn btn-light my-2" data-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@endsection


@section('script')

            <script>
                $(document).ready(function() {
                    $(".img_avatar").slice(0,2).show();
                    $("#more").click(function() {
                        $(".img_avatar:hidden").slice(0,$(".img_avatar").length).slideDown();
                        if ($(".img_avatar:hidden").length==0) {
                            $("#more").fadeOut()
                        }
                    })
                })
            </script>
    <!-- Page js-->
@endsection

