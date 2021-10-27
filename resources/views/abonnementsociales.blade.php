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
    @foreach($abonnementsociales as $abonnementsociale)
        <div class="card" style="width: 500px;">
            <div class="row no-gutters">

                <div class="col-sm-5">
                    <p>  {{$abonnementsociale->cartereference}} </p>

                    <p class="card-text">  الثمن {{$abonnementsociale->prixtotale}}</p>
                </div>


                <div class="col-sm-7">
                    <div class="card-body">
                        <div class="col-12">
                            <p>  {{$abonnementsociale->anneeuniversitaire}} </p>
                            <p style="margin-bottom: 0!important;">

                                {{$abonnementsociale->nom}}   {{$abonnementsociale->prenomabonne}}
                                <b> : الاسم واللقب </b>

                            </p>
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">
                                {{$abonnementsociale->annee->nom}}
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
                                <b>{{$abonnementsociale->created_at->format('d/m/Y')}}</b>
                            </p>
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 0!important;">


                                <b>  {{ $abonnementsociale->periodeabonnement->periode}}</b>
                                <b> :صالحة </b>
                            </p>
                        </div>

                        <div class="col-12">
                            <div style="margin-bottom: 0!important;">

                                <div>

                                    <strong style="font-size: 16px">  {{$abonnementsociale->stationfin}} </strong>
                                    <b>:وصولاً إلى</b>

                                    <strong style="font-size: 16px"> {{$abonnementsociale->stationdebut}} </strong>

                                    <b>: إنطلاقا من</b>

                                </div>

                            </div>
                        </div>




                    </div>

                </div>

            </div>

        </div>

</div>
@endforeach
<a href="{{route('downloadPDF2')}}" class="btn btn-lg btn-success">{{__('Imprimer')}}</a>
</body>

</html>
