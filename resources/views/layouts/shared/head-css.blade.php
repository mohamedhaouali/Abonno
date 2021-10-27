@yield('css')

<!-- icons -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/iziToast/iziToast.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .full-loading {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: block;
        overflow: hidden;
    }
    .lds-ellipsis {
        display: inline-block;
        position: absolute;
        width: 64px;
        height: 64px;
        top: 50%;
        left: 50%;
        margin-top: -32px;
        margin-left: -32px; }

    .lds-ellipsis div {
        position: absolute;
        top: 27px;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: #6658dd;
        animation-timing-function: cubic-bezier(0, 1, 1, 0); }

    .lds-ellipsis div:nth-child(1) {
        left: 6px;
        animation: lds-ellipsis1 0.6s infinite; }

    .lds-ellipsis div:nth-child(2) {
        left: 6px;
        animation: lds-ellipsis2 0.6s infinite; }

    .lds-ellipsis div:nth-child(3) {
        left: 26px;
        animation: lds-ellipsis2 0.6s infinite; }

    .lds-ellipsis div:nth-child(4) {
        left: 45px;
        animation: lds-ellipsis3 0.6s infinite; }

    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0); }
        100% {
            transform: scale(1); } }

    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1); }
        100% {
            transform: scale(0); } }

    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0); }
        100% {
            transform: translate(19px, 0); } }
</style>

@if(isset($mode) && $mode == 'rtl' || app()->getLocale()=='ar')

    <!-- App css -->
    @if(isset($demo) && $demo == 'creative')
        <link href="{{asset('assets/css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('assets/css/app-creative-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{asset('assets/css/bootstrap-creative-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{asset('assets/css/app-creative-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
    @else
        @if(isset($demo) && $demo == 'modern')
            <link href="{{asset('assets/css/bootstrap-modern.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
            <link href="{{asset('assets/css/app-modern-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
            <link href="{{asset('assets/css/bootstrap-modern-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
            <link href="{{asset('assets/css/app-modern-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
        @else
            @if(isset($demo) && $demo == 'material')
                <link href="{{asset('assets/css/bootstrap-material.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                <link href="{{asset('assets/css/app-material-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                <link href="{{asset('assets/css/bootstrap-material-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                <link href="{{asset('assets/css/app-material-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
            @else
                @if(isset($demo) && $demo == 'purple')
                    <link href="{{asset('assets/css/bootstrap-purple.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                    <link href="{{asset('assets/css/app-purple-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                    <link href="{{asset('assets/css/bootstrap-purple-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                    <link href="{{asset('assets/css/app-purple-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
                @else
                    @if(isset($demo) && $demo == 'saas')
                        <link href="{{asset('assets/css/bootstrap-saas.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                        <link href="{{asset('assets/css/app-saas-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                        <link href="{{asset('assets/css/bootstrap-saas-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                        <link href="{{asset('assets/css/app-saas-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
                    @else
                        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                        <link href="{{asset('assets/css/app-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                        <link href="{{asset('assets/css/bootstrap-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                        <link href="{{asset('assets/css/app-dark-rtl.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
                        @endif
                @endif
            @endif
        @endif
    @endif

@else
    <!-- App css -->
    @if(isset($demo) && $demo == 'creative')
    <link href="{{asset('assets/css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app-creative.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{asset('assets/css/bootstrap-creative-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-creative-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
    @else
    @if(isset($demo) && $demo == 'modern')
        <link href="{{asset('assets/css/bootstrap-modern.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('assets/css/app-modern.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{asset('assets/css/bootstrap-modern-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{asset('assets/css/app-modern-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
    @else
        @if(isset($demo) && $demo == 'material')
            <link href="{{asset('assets/css/bootstrap-material.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
            <link href="{{asset('assets/css/app-material.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
            <link href="{{asset('assets/css/bootstrap-material-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
            <link href="{{asset('assets/css/app-material-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
        @else
            @if(isset($demo) && $demo == 'purple')
                <link href="{{asset('assets/css/bootstrap-purple.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                <link href="{{asset('assets/css/app-purple.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                <link href="{{asset('assets/css/bootstrap-purple-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                <link href="{{asset('assets/css/app-purple-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
            @else
                @if(isset($demo) && $demo == 'saas')
                    <link href="{{asset('assets/css/bootstrap-saas.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                    <link href="{{asset('assets/css/app-saas.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                    <link href="{{asset('assets/css/bootstrap-saas-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                    <link href="{{asset('assets/css/app-saas-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
                @else
                    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                    <link href="{{asset('assets/css/app.min.css')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
                    <link href="{{asset('assets/css/bootstrap-dark.min.css')}} " rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
                    <link href="{{asset('assets/css/app-dark.min.css')}} " rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
                    @endif
            @endif
        @endif
    @endif
    @endif
@endif
