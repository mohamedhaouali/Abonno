@extends('home')
@section('css')
    <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    {{--    {{dd($errors)}}--}}
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Srts</a></li>
                            <li class="breadcrumb-item"><a href="{{route('agences.index')}}">{{__('Agences')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Créer Une Agence')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('Créer Une Agence')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
                <div class="col-lg-12">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src=" {{ asset('asset/images/marker_agency.png')}}"alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-20"></h4>
                            <p class="text-muted  font-14 mb-0">
                                {{__('Code')}} : {{$agence->code}}
                            </p>
                            <p class="text-muted  font-14">
                                {{__('Municipalité')}} : {{app()->getLocale()=='fr' ? $agence->municipalite->nom_fr : $agence->municipalite->nom_ar}}
                            </p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            <div class="row">
                            <div class="col-sm-12">
                                <div id="map" class="map-section-map" style="height: 400px!important;padding-bottom: 0;"></div>
                            </div>
                        </div>
                        </p>



{{--                        <div class="row mt-4 text-center">--}}
{{--                            <div class="col-6">--}}
{{--                                <h5 class="font-weight-normal text-muted">{{__('Revenue')}} ({{__('Tnd')}})</h5>--}}
{{--                                <h4>17,786 cr</h4>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <h5 class="font-weight-normal text-muted">{{__("Nombre d'Employés")}}</h5>--}}
{{--                                <h4>{{$agency->users()->count()}}</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-6 float-right">
                                <a href="{{route('edit',['id'=>$agence->id])}}" class="btn float-right btn-info">{{__('Modifier')}}</a>

                            </div>
                            <div class="col-6 float-right">
                                <a class="btn btn-success  mr-2" href="{{route('agences.index')}}">{{ __('Retour') }}</a>
                            </div>
                        </div>

                    </div> <!-- end card-box -->
                </div><!-- end col -->
{{--                <div class="col-lg-8 ">--}}
{{--                <div class="card border">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title mb-3">{{__("Nombre d'abonnements par catégorie/semaine")}}</h5>--}}
{{--                        <div class="mt-3 chartjs-chart" style="height: 320px;">--}}
{{--                            <canvas id="line-chart-example"></canvas>--}}
{{--                        </div>--}}
{{--                    </div> <!-- end card-body-->--}}
{{--                </div> <!-- end card-->--}}
{{--            </div> <!-- end col-->--}}
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
@section('script')
    <script src="{{asset('assets/libs/chart.js/chart.js.min.js')}}"></script>
{{--    <script>--}}
{{--        ! function ($) {--}}
{{--            "use strict";--}}

{{--            var ChartJs = function () {--}}
{{--                this.$body = $("body"),--}}
{{--                    this.charts = []--}}
{{--            };--}}

{{--            ChartJs.prototype.respChart = function (selector, type, data, options) {--}}
{{--                var draw = Chart.controllers.line.prototype.draw;--}}
{{--                Chart.controllers.line.prototype.draw = function () {--}}
{{--                    draw.apply(this, arguments);--}}
{{--                    var ctx = this.chart.chart.ctx;--}}
{{--                    var _stroke = ctx.stroke;--}}
{{--                    ctx.stroke = function () {--}}
{{--                        ctx.save();--}}
{{--                        ctx.shadowColor = 'rgba(0,0,0,0.01)';--}}
{{--                        ctx.shadowBlur = 20;--}}
{{--                        ctx.shadowOffsetX = 0;--}}
{{--                        ctx.shadowOffsetY = 5;--}}
{{--                        _stroke.apply(this, arguments);--}}
{{--                        ctx.restore();--}}
{{--                    }--}}
{{--                };--}}

{{--                //default config--}}
{{--                Chart.defaults.global.defaultFontColor = "#8391a2";--}}
{{--                Chart.defaults.scale.gridLines.color = "#8391a2";--}}

{{--                // get selector by context--}}
{{--                var ctx = selector.get(0).getContext("2d");--}}
{{--                // pointing parent container to make chart js inherit its width--}}
{{--                var container = $(selector).parent();--}}

{{--                // this function produce the responsive Chart JS--}}
{{--                function generateChart() {--}}
{{--                    // make chart width fit with its container--}}
{{--                    var ww = selector.attr('width', $(container).width());--}}
{{--                    var chart;--}}
{{--                    switch (type) {--}}
{{--                        case 'Line':--}}
{{--                            chart = new Chart(ctx, { type: 'line', data: data, options: options });--}}
{{--                            break;--}}
{{--                        case 'Doughnut':--}}
{{--                            chart = new Chart(ctx, { type: 'doughnut', data: data, options: options });--}}
{{--                            break;--}}
{{--                        case 'Pie':--}}
{{--                            chart = new Chart(ctx, { type: 'pie', data: data, options: options });--}}
{{--                            break;--}}
{{--                        case 'Bar':--}}
{{--                            chart = new Chart(ctx, { type: 'bar', data: data, options: options });--}}
{{--                            break;--}}
{{--                        case 'Radar':--}}
{{--                            chart = new Chart(ctx, { type: 'radar', data: data, options: options });--}}
{{--                            break;--}}
{{--                        case 'PolarArea':--}}
{{--                            chart = new Chart(ctx, { data: data, type: 'polarArea', options: options });--}}
{{--                            break;--}}
{{--                    }--}}
{{--                    return chart;--}}
{{--                };--}}
{{--                // run function - render chart at first load--}}
{{--                return generateChart();--}}
{{--            },--}}
{{--                // init various charts and returns--}}
{{--                ChartJs.prototype.initCharts = function () {--}}
{{--                    var charts = [];--}}
{{--                    if ($('#line-chart-example').length > 0) {--}}
{{--                        var lineChart = {--}}
{{--                            labels: ["{{__("Lun")}}","{{__("Mar")}}", "{{__("Mer")}}", "{{__("Jeu")}}", "{{__("Ven")}}", "{{__("Sam")}}", "{{__("Dim")}}"],--}}
{{--                            datasets: [{--}}
{{--                                label: "{{__('Scolaire')}}",--}}
{{--                                backgroundColor: 'rgba(74, 129, 212, 0.3)',--}}
{{--                                borderColor: '#4a81d4',--}}
{{--                                borderDash: [5, 5],--}}
{{--                                data: [--}}
{{--                                    @foreach($initscolaire as $scolaire)--}}
{{--                                    {{$scolaire}},--}}
{{--                                    @endforeach--}}
{{--                                ]--}}
{{--                            }, {--}}
{{--                                label: "{{__('Civile')}}",--}}
{{--                                fill: true,--}}
{{--                                backgroundColor: 'rgba(212,74,90,0.3)',--}}
{{--                                borderColor: "#f1556c",--}}
{{--                                borderDash: [5, 5],--}}
{{--                                data: [--}}
{{--                                    @foreach($initcivile as $civile)--}}
{{--                                    {{$civile}},--}}
{{--                                    @endforeach--}}
{{--                                ]--}}
{{--                            },{--}}
{{--                                label: "{{__('Sociale')}}",--}}
{{--                                backgroundColor: 'rgba(12,243,0,0.29)',--}}
{{--                                borderColor: '#4ad471',--}}
{{--                                borderDash: [5, 5],--}}
{{--                                data: [--}}
{{--                                    @foreach($initsociale as $sociale)--}}
{{--                                    {{$sociale}},--}}
{{--                                    @endforeach--}}
{{--                                ]--}}
{{--                            }]--}}
{{--                        };--}}

{{--                        var lineOpts = {--}}
{{--                            maintainAspectRatio: false,--}}
{{--                            legend: {--}}
{{--                                display: false--}}
{{--                            },--}}
{{--                            tooltips: {--}}
{{--                                intersect: false--}}
{{--                            },--}}
{{--                            hover: {--}}
{{--                                intersect: true--}}
{{--                            },--}}
{{--                            plugins: {--}}
{{--                                filler: {--}}
{{--                                    propagate: false--}}
{{--                                }--}}
{{--                            },--}}
{{--                            scales: {--}}
{{--                                xAxes: [{--}}
{{--                                    reverse: true,--}}
{{--                                    gridLines: {--}}
{{--                                        color: "rgba(0,0,0,0.05)"--}}
{{--                                    }--}}
{{--                                }],--}}
{{--                                yAxes: [{--}}
{{--                                    ticks: {--}}
{{--                                        stepSize: 20--}}
{{--                                    },--}}
{{--                                    display: true,--}}
{{--                                    borderDash: [5, 5],--}}
{{--                                    gridLines: {--}}
{{--                                        color: "rgba(0,0,0,0)",--}}
{{--                                        fontColor: '#fff'--}}
{{--                                    }--}}
{{--                                }]--}}
{{--                            }--}}
{{--                        };--}}
{{--                        charts.push(this.respChart($("#line-chart-example"), 'Line', lineChart, lineOpts));--}}
{{--                    }--}}


{{--                    return charts;--}}
{{--                },--}}
{{--                //initializing various components and plugins--}}
{{--                ChartJs.prototype.init = function () {--}}
{{--                    var $this = this;--}}
{{--                    // font--}}
{{--                    Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';--}}

{{--                    // init charts--}}
{{--                    $this.charts = this.initCharts();--}}

{{--                    // enable resizing matter--}}
{{--                    $(window).on('resize', function (e) {--}}
{{--                        $.each($this.charts, function (index, chart) {--}}
{{--                            try {--}}
{{--                                chart.destroy();--}}
{{--                            }--}}
{{--                            catch (err) {--}}
{{--                            }--}}
{{--                        });--}}
{{--                        $this.charts = $this.initCharts();--}}
{{--                    });--}}
{{--                },--}}

{{--                //init flotchart--}}
{{--                $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs--}}
{{--        }(window.jQuery),--}}

{{--            //initializing ChartJs--}}
{{--            function ($) {--}}
{{--                "use strict";--}}
{{--                $.ChartJs.init()--}}
{{--            }(window.jQuery);--}}
{{--    </script>--}}
    <script>
        var map;
        var markersArray = [];
        var geocoder;
        function initMap() {
            var iconBase = "  {{ asset('asset/images/marker_agency.png')}}";

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 36.0887208, lng: 9.3645335},
                zoom: 8,
                mapTypeId: 'roadmap',

            });
            geocoder = new google.maps.Geocoder();
            var marker = new google.maps.Marker({
                position: {lat: 36.0887208, lng: 9.3645335},
                map: map,
                center:{lat: 36.0887208, lng: 9.3645335},
                icon: iconBase,
                draggable:false,
                zoom:8,
            });


            //Make Google Place
            let input = document.getElementById('house_address');
            let ac = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(ac, 'place_changed', function () {
                var place = ac.getPlace();
                $('#house_lat').val(place.geometry.location.lat());
                $('#house_lng').val(place.geometry.location.lng());
                // setMarker(false);
            });
        }

        function clearOverlays() {
            for (var i = 0; i < markersArray.length; i++ ) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
        }

        function setMarker(withscroll = false) {
            let lat = $('#house_lat').val();
            let lng = $('#house_lng').val();
            if ((lat != '') && (lng !='')) {
                lat = parseFloat(lat);
                lng = parseFloat(lng);
                markersArray[0].setPosition({lat,lng});
                map.panTo( new google.maps.LatLng( lat, lng ) );
                geocodeLatLng(geocoder,map,lat,lng,function (addr) {
                    $('#house_address').val(addr);
                    $('#address-place').text(addr != '' ? addr : 'Adresse');
                });
                if (withscroll) {scrollSmooth();}
            } else {
                iziToast.error({
                    title: 'Erreur',
                    message: 'Veuiller Remplir Les coordonnes géorgaphiques',
                    position: 'bottomRight'
                });
            }
        }

        function geocodeLatLng(geocoder, map,lat,lng,callback) {
            const latlng = {
                lat,
                lng
            };
            geocoder.geocode({ location: latlng }, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        console.log(results[0]);
                        callback(results[1].formatted_address);
                    } else {
                        window.alert("No results found");
                        callback('');
                    }
                } else {
                    window.alert("Geocoder failed due to: " + status);
                    callback('');
                }
            });

        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF1WXfQV2SeRlO-P9qYwMZvcCLrb2r1zA&callback=initMap&libraries=places"
            async defer></script>
@endsection
