
@extends('home')

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">{{__('tableau de bord')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            {{--            @hasrole('user')--}}
            <div class="col-md-4 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-credit-card font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="mt-1"><span data-plugin="counterup">{{$abonnementsociales}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">{{__('Abonnements')}}</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-4 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-user font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$clients}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">{{__('Clients')}}</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-4 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$money}}</span> {{__('Tnd')}}</h3>
                                <p class="text-muted mb-1 text-truncate">{{__('Revenue')}}</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            {{--            @endhasrole--}}
        </div>


        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                        {{--                            <button type="button" class="btn btn-xs btn-light">Today</button>--}}
                        {{--                            <button type="button" class="btn btn-xs btn-light">Weekly</button>--}}
                        <button type="button" class="btn btn-xs btn-secondary">{{__('Mensuel')}}</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">{{__('Analyse des ventes')}}</h4>

                <div dir="ltr">
                    <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->


    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>
    <!-- Plugins js-->
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>




@endsection

