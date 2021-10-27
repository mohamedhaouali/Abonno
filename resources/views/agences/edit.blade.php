@extends('home')
@section('css')
    <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Agences')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Modifier Une Agence')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('Modifier Une Agence')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6 mx-auto" >
                <div class="card border">
                    <div class="card-body">
                        <h4 class="header-title text-center">{{__('Formulaire de Modification')}}</h4>
                        <p class="sub-header text-center">{{__('Nom Agence').': '.$agence->nom_fr.' '.__('Adresse Agence').': '.$agence->address}}</p>

                        <form id="form" class="needs-validation"  method="POST" action="{{ route('agences.update',$agence->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="name_french">{{ __('Nom Agence francais') }}</label>
                                    <input value="{{$agence->nom_fr}}" name="nom_fr" type="text" class="form-control " id="nom_fr" @error('nom_fr') is-invalid @enderror placeholder="{{ __('Nom Agence') }}" value="{{$agence->nom_fr}}" required>
                                    @error('nom_fr')
                                    <span class="invalid-feedback" style="display: block !important;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="name_arab">{{ __('Nom Agence arabe') }}</label>
                                    <input value="{{$agence->nom_ar}}" name="nom_ar" type="text" class="form-control " id="nom_ar" @error('nom_ar') is-invalid @enderror placeholder="{{ __('Nom Agence') }}" value="{{$agence->nom_ar}}" required>
                                    @error('nom_ar')
                                    <span class="invalid-feedback" style="display: block !important;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label for="code">{{ __('Code Agence') }}</label>
                                    <input value="{{$agence->code}}" name="code" type="text" class="form-control " id="code" @error('code') is-invalid @enderror placeholder="{{ __('Code Agence') }}" value="{{$agence->code}}" required>
                                    @error('code')
                                    <span class="invalid-feedback" style="display: block !important;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="address">{{ __('Adresse Agence') }}</label>
                                    <input value="{{$agence->address}}" name="address" type="text" class="form-control " id="address" @error('address') is-invalid @enderror placeholder="{{ __('Adresse Agence') }}" value="{{$agence->address}}" required>
                                    @error('address')
                                    <span class="invalid-feedback" style="display: block !important;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                            </div>
                            <div class="form-group mb-3 ">
                                <label for="municipalite_id">Municipalite</label>
                                <select class="form-control form-control-lg" id="municipalite_id" name="municipalite_id" >
                                    @foreach($municipalites as $municipalite)
                                        @if($agence->municipalite && $agence->municipalite->id == $municipalite->id)
                                            <option selected value="{{$municipalite->id}}">{{$municipalite->nom_fr}}</option>
                                        @else
                                            <option value="{{$municipalite->id}}">{{$municipalite->nom_fr}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>

                            </div>
                            <div class="row ">
                                <div class="col-6 float-right">
                                    <a class="btn btn-success float-right mr-2" href="{{route('agences.index')}}">{{ __('Retour') }}</a>
                                </div>
                                <div class="col-6 ">
                                    <button class="btn btn-primary" type="submit">{{ __('Confirmer') }}</button>
                                </div>
                            </div>
                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
@section('script')

    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
    <!-- Plugins js-->


{{--    <script>--}}
{{--        $('#municipality').select2();--}}
{{--    </script>--}}

@endsection
