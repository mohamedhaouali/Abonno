<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Horizontal Card Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .bcontent {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container bcontent">
    <h2>Bootstrap Horizontal Card</h2>
    <hr />
    @foreach($abonnementciviles as $abonnementcivile)
        <div class="card" style="width: 500px;">
            <div class="row no-gutters">

                <div class="col-sm-5">
                    <p>  {{$abonnementcivile->cartereference}} </p>

                    <p class="card-text">  الثمن {{$abonnementcivile->prixtotale}}</p>
                </div>


                <div class="col-sm-7">
                    <div class="card-body">
                        <div class="col-12">
                            <p>  {{$abonnementcivile->annee->nom}} </p>
                            <p style="margin-bottom: 0!important;">

                                {{$abonnementcivile->nom}}   {{$abonnementcivile->prenomabonne}}
                                <b> : الاسم واللقب </b>

                            </p>
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">
                                {{$abonnementcivile->datenaissance}}
                                <b> : تاریخ الولادة  </b>

                            </p>

                        </div>
                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">


                                <b>:الصنف</b>
                            </p>
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">
                                <b>سلمت في :</b>
                                <b>{{$abonnementcivile->created_at}}</b>
                            </p>
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">


                                <b>  {{ $abonnementcivile->periodeabonnement->periode}}</b>
                                <b> :صالحة </b>
                            </p>
                        </div>

                        <div class="col-12">
                            <div style="margin-bottom: 0!important;">

                                <div>

                                    <strong style="font-size: 16px">  {{$abonnementcivile->stationfin}} </strong>
                                    <b>:وصولاً إلى</b>

                                    <strong style="font-size: 16px"> {{$abonnementcivile->stationdebut}} </strong>

                                    <b>: إنطلاقا من</b>

                                </div>

                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('downloadPDF1')}}" class="btn btn-lg btn-success">{{__('Imprimer')}}</a>
</div>
@endforeach
</body>

</html>
