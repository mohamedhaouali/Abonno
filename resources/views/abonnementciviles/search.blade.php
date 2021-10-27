@extends('home')

@section('content')
    <style>


        .card-link + .card-link {
            margin-right: 1.25rem;
        }

        .card-blockquote {
            border-right: 0;
        }

        .breadcrumb-item {
            float: right;
        }



        .page-link {

            margin-right: -1px;
        }

        .alert-dismissible {
            padding-left: 2rem;
        }

        .alert-dismissible .close {
            left: -1rem;
        }

        .media-list {
            padding-right: 0;
        }

        .list-group {
            padding-right: 0;
        }

        .embed-responsive .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
            right: 0;
        }

        .close {
            float: left;
        }

        .tooltip {
            text-align: right;
        }

        .tooltip.tooltip-top .tooltip-arrow,
        .tooltip.bs-tether-element-attached-bottom .tooltip-arrow {
            right: 50%;
            margin-right: -5px;
        }

        .tooltip.tooltip-bottom .tooltip-arrow,
        .tooltip.bs-tether-element-attached-top .tooltip-arrow {
            right: 50%;
            margin-right: -5px;
        }

        .popover {
            right: 0;
            text-align: right;
        }

        .popover.popover-top .popover-arrow,
        .popover.bs-tether-element-attached-bottom .popover-arrow {
            right: 50%;
            margin-right: -11px;
        }

        .popover.popover-top .popover-arrow::after,
        .popover.bs-tether-element-attached-bottom .popover-arrow::after {
            margin-right: -10px;
        }

        .popover.popover-bottom .popover-arrow,
        .popover.bs-tether-element-attached-top .popover-arrow {
            right: 50%;
            margin-right: -11px;
        }

        .popover.popover-bottom .popover-arrow::after,
        .popover.bs-tether-element-attached-top .popover-arrow::after {
            margin-right: -10px;
        }

        @media all and (transform-3d), (-webkit-transform-3d) {
            .carousel-inner > .carousel-item.next,
            .carousel-inner > .carousel-item.active.right {
                right: 0;
            }

            .carousel-inner > .carousel-item.prev,
            .carousel-inner > .carousel-item.active.left {
                right: 0;
            }

            .carousel-inner > .carousel-item.next.left,
            .carousel-inner > .carousel-item.prev.right,
            .carousel-inner > .carousel-item.active {
                right: 0;
            }
        }

        .carousel-inner > .active {
            right: 0;
        }

        .carousel-inner > .next {
            right: 100%;
        }

        .carousel-inner > .prev {
            right: -100%;
        }

        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
            right: 0;
        }

        .carousel-inner > .active.left {
            right: -100%;
        }

        .carousel-inner > .active.right {
            right: 100%;
        }

        /*.carousel-control {
          right: 0;
        }

        .carousel-control.right {
          left: 0;
          right: auto;
        }*/

        .carousel-control .icon-prev {
            right: 50%;
            margin-right: -10px;
        }

        .carousel-control .icon-next {
            left: 50%;
            margin-left: -10px;
        }

        .carousel-indicators {
            right: 50%;
            padding-right: 0;
            margin-right: -30%;
        }

        .carousel-caption {
            left: 15%;
            right: 15%;
            z-index: 10;
        }

        @media (min-width: 544px) {
            .carousel-control .icon-prev {
                margin-right: -15px;
            }

            .carousel-control .icon-next {
                margin-left: -15px;
            }

            .carousel-caption {
                left: 20%;
                right: 20%;
            }
        }





        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-right: 250px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            right: 250px;
            width: 0;
            height: 100%;
            margin-right: -250px;
            overflow-y: auto;
            background: #B0E0E6;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }



    </style>
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                <div class="p-3">



                    <form class="form-group" method="get" action="{{route('addabonnementcivile')}}">
                        @csrf
                        <div class="row">
                            @can('edit1-users')
                                <div class="col">
                                    <button type="submit" class="btn btn-success">{{ __('Creer') }}</button>
                                </div>
                            @endcan


                        </div>
                    </form>


                </div>


            </ul>
        </div> <!-- /#sidebar-wrapper -->
        <!-- Page Content -->

    </div> <!-- /#wrapper -->
    <main role="main" >

        @if(count($abonnementciviles) < 1)

            <p><center> <strong> Client n'existe pas </strong> </center></p>

        @else


            @foreach($abonnementciviles as $abonnementcivile)

                <div class="container bcontent">

                    <hr />
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">

                            <div class="col-sm-5">

                                <img src="{{asset('images')}}/{{$abonnementcivile->profileimage}}" style="max-height:60px;" />

                            </div>


                            <div class="col-sm-7">
                                <div class="card-body">
                                    <div class="col-12">
                                        <p>  </p>
                                        <p style="margin-bottom: 0!important;">

                                            {{$abonnementcivile->nom}}   {{$abonnementcivile->prenom}}
                                            <b> : الاسم واللقب </b>

                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <p style="margin-bottom: 0!important;">
                                            {{$abonnementcivile->cin}}
                                            <b> :بطاقة تعريف   </b>

                                        </p>

                                    </div>

                                    <div class="col-12">
                                        <p style="margin-bottom: 0!important;">
                                            {{$abonnementcivile->companie->nom_ar}}
                                            <b> :شركة   </b>

                                        </p>

                                    </div>


                                    <div class="col-12">
                                        <p style="margin-bottom: 0!important;">
                                            <b>سلمت في :</b>
                                            <b>{{$abonnementcivile->created_at->format('d/m/Y')}}</b>
                                        </p>
                                    </div>

                                    <a href="{{route('editabonnementcivile',['id'=>$abonnementcivile->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                        Modifier</a>
                                    <a href="{{route('showcivile',['id'=>$abonnementcivile->id])}}" class="btn btn-success">
                                        Voir</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                @endforeach
                @endif

                </tbody>

    </main>

@endsection
