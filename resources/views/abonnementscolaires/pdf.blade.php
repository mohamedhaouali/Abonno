@extends('home')
@section('css')
    <style>
        html
        {
            direction:ltr!important;
        }

        body {
            color:black;
            background-color:white;

        }
    </style>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Srts</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Abonnements')}}</a></li>
                            <li class="breadcrumb-item active">{{__("Détails Abonnement")}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Validation</h4>
                </div>
            </div>
        </div>

        <!-- end page title -->


        {{--            <div class="col-lg-6 mx-auto">--}}
        {{--                <div class="card border">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h4 class="header-title text-center">{{__('Abonnement')}} {{app()->getLocale()=='fr' ? $subscription->category->name_french : $subscription->category->name_french}} ---}}
        {{--                            <b>{{$subscription->client->name}}</b></h4>--}}
        {{--                        <p class="sub-header text-center font-20">{{__('Date')}} <u><b>{{$subscription->created_at->diffForHumans()}}</b></u></p>--}}
        {{--                        <div class="container" style="background:white;width: 400px;height:250px;border: 1px solid #0a1520;border-radius: 1%;">--}}
        {{--                            <div class="row ">--}}
        {{--                                <div class="col-md-2">--}}
        {{--                                    <img style="width: 120%;" src="{{$subscription->client->picture ?  asset('storage/clients/'.$subscription->client->picture) : asset('default.png')}}">--}}
        {{--                                </div>--}}
        {{--                                <div class="col-md-8 text-center">--}}
        {{--                                    <p style="margin-bottom: 0!important;"><b>رقم البطاقة </b></p>--}}
        {{--                                    <p><b>{{$subscription->code}}</b></p>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="d-flex flex-row-reverse ">--}}
        {{--                                <p style="margin-bottom: 0!important;">--}}
        {{--                                    <b>الاسم واللقب :</b>--}}
        {{--                                    <b>{{$subscription->client->name}}</b>--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                            <div class="d-flex flex-row-reverse ">--}}
        {{--                                <p style="margin-bottom: 0!important;">--}}
        {{--                                    <b>تاریخ الولادة :</b>--}}
        {{--                                    <b>{{$subscription->client->birth}}</b>--}}
        {{--                                </p>--}}
        {{--                                <p class="pr-2" style="margin-bottom: 0!important;">--}}
        {{--                                    <b>الصنف :</b>--}}
        {{--                                    <b>{{$subscription->category->name_arab}}</b>--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                            <div class="d-flex flex-row-reverse ">--}}
        {{--                                <p style="margin-bottom: 0!important;">--}}
        {{--                                    <b>الثمن :</b>--}}
        {{--                                    <b>{{$subscription->price}}</b>--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                            <div class="d-flex flex-row-reverse ">--}}
        {{--                                <p style="margin-bottom: 0!important;">--}}
        {{--                                    <b>:صالحة من </b>--}}
        {{--                                <p><b>{{$subscription->start}}</b></p>--}}
        {{--                                </p>--}}
        {{--                                <p class="pr-2" style="margin-bottom: 0!important;">--}}
        {{--                                    <b>:إلى </b>--}}
        {{--                                <p><b>{{$subscription->start}}</b></p>--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                            <div class="d-flex flex-row-reverse ">--}}
        {{--                                <div style="margin-bottom: 0!important;">--}}
        {{--                                    <table style="float: right;font-weight: bold;border: 1px solid #000000;border-collapse: collapse;margin: 0;padding: 0;border-spacing: 0; ">--}}
        {{--                                        <thead>--}}
        {{--                                        <tr style="border: 1px solid #000000;">--}}
        {{--                                            <td style=" text-align: center;">--}}
        {{--                                                <div>وصولاً إلى&nbsp;</div>--}}
        {{--                                            </td>--}}
        {{--                                            <td style="text-align: center;padding-left: 100px;">--}}
        {{--                                                <div>إنطلاقا من</div>--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        @foreach ($subscription->line as $l)--}}
        {{--                                        <tr style="margin: 0;padding: 0;">--}}
        {{--                                            <td style=" text-align: center;">--}}
        {{--                                                <div>{{$l->stations()->orderBy('order','desc')->first()->name_arab}}</div>--}}
        {{--                                            </td>--}}

        {{--                                            <td style="text-align: center;padding-left: 100px;margin-top: 0">--}}
        {{--                                                <div>{{$l->stations()->orderBy('order')->first()->name_arab}}</div>--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        @endforeach--}}
        {{--                                        </thead>--}}
        {{--                                    </table>--}}
        {{--                                </div>--}}
        {{--                                <p class="pr-2" style="margin-bottom: 0!important;">--}}
        {{--                                    <b>سلمت في :</b>--}}
        {{--                                    <b>{{$subscription->created_at->format('Y-m-d')}}</b>--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="d-flex justify-content-center">--}}
        {{--                            <div class="p-2">--}}
        {{--                                <a href="{{route('pdf',$subscription->id)}}" class="btn btn-lg btn-success">{{__('Imprimer')}}</a>--}}
        {{--                            </div>--}}
        {{--                            <div class="p-2">--}}
        {{--                                <a href="{{route('subscriptions.index')}}" class="btn btn-lg btn-danger">{{__('retour')}}</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div> <!-- end card-body-->--}}
        {{--                </div> <!-- end card-->--}}
        {{--            </div> <!-- end col-->--}}
        <div class="row">

            <div class="col-lg-4 mx-auto" style="width:400px!important;height: 250px!important;
                border-radius: 20px;;background-size: cover;
                background-image: url({{asset('asset/images/backgroundScolaire.png')}});>

                <div class="card-box ribbon-box border style="width: 400px!important;height: 250px!important;border-radius: 20px;
            width: 50px;margin-bottom: 250px; ">

                <div class="col-12 mb-1"  style="font-family: initial;color: black;text-align: center" >
                    <p class="mb-0"><b>

                            {{str_replace('.',',',$abonnementscolaire->annee->nom)}}
                        </b>
                    </p>
                </div>


                <div class="ribbon-two ribbon-two-primary"><span>{{app()->getLocale()=='fr'  }}</span></div>

                <div class="row" style="font-family: initial;color: black;">
                    <div class="col-4 float-left">
                        <div class="row text-center  pull-left" style="margin-left: -36px;" >
                            <div class="col-12" style="margin-top: 79.5px;" >

                                {{--                                        <p class="mb-0 font-weight-bold" style="font-family: 'Nunito';" >--}}
                                {{--                                            <b>رقم البطاقة<br>{{$subscription->code}}</b>--}}
                                {{--                                        </p>--}}
                            </div>
                            <div class="col-12 mb-1" >
                                <img style="width: 95px;height: 85px;border-radius: 32px;" src="{{asset('images')}}/{{$abonnementscolaire->profileimage}}" style="max-height:60px;">
                            </div>
                            <div class="col-12 ">
                                <p class="mb-0"><b>
                                        الثمن
                                        {{str_replace('.',',',$abonnementscolaire->prixtotale)}}
                                    </b>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-8 float-right" style="padding-right: 0px;margin-top: -19px">
                        <div class="row text-right" style="font-size: 15px;margin-top: 98px;">
                            <div class="col-12">
                                <p style="margin-bottom: 0!important;">
                                    <b>{{$abonnementscolaire->nom}}{{ $abonnementscolaire->prenomabonne}}</b>
                                    <b> :الاسم واللقب </b>

                                </p>
                            </div>

                            <div class="col-12">
                                <div style="margin-bottom: 0!important;">

                                    <div>

                                        <strong style="font-size: 16px">  {{$abonnementscolaire->etudiant->nom}} </strong>
                                        تاریخ الولادة  :

                                        <strong style="font-size: 16px">   {{$abonnementscolaire->datenaissance}} </strong>
                                        :الصنف


                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <p style="margin-bottom: 0!important;">
                                    <b>سلمت في :</b>
                                    <b>{{$abonnementscolaire->created_at->format('d/m/Y')}}</b>
                                </p>
                            </div>
                            <div class="col-12">
                                <p style="margin-bottom: 0!important;">
                                    {{--                                            <b>صالحة من </b>--}}
                                    {{--                                        <b>{{$subscription->start}}</b>--}}
                                    {{--                                            <b>إلى </b>--}}
                                    {{--                                        <b>{{$subscription->end}}</b>--}}

                                    {{ $abonnementscolaire->periodeabonnement->periode}}
                                    <b>:صالحة </b>
                                </p>
                            </div>
                            <div class="col-12">
                                <div style="margin-bottom: 0!important;">

                                    <div>

                                        <strong style="font-size: 16px">   {{ $abonnementscolaire->stationfin}} </strong>
                                        وصولاً إلى
                                        <strong style="font-size: 16px"> {{ $abonnementscolaire->stationdebut}} </strong>
                                        إنطلاقا من

                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6 mx-auto">
            <div class="d-flex justify-content-center">
                <div class="p-2">
                    <a href="#" class="btn btn-lg btn-success">{{__('Imprimer')}}</a>
                </div>

                <div class="p-2">
                    <a href="{{route('indexabonnementscolaire')}}" class="btn btn-lg btn-danger">{{__('retour')}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection
