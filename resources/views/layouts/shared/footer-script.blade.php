<!-- bundle -->
<!-- Vendor js -->

<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/libs/iziToast/iziToast.min.js')}}"></script>


@yield('script')
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
@yield('script-bottom')
<script>
@if($errors->all())
    @foreach($errors->all() as $message)
        iziToast.error({
        title: 'Erreur',
        message: '{{ $message }}',
        position: 'bottomRight'
        });
    @endforeach

@elseif(session()->has('message'))
    iziToast.success({
    title: 'Succès',
    message: '{{ session()->get('message') }}',
    position: 'bottomRight'
    });

@elseif(session()->has('error'))
    iziToast.error({
    title: 'Erreur',
    message: '{{ session()->get('error') }}',
    position: 'bottomRight'
    });
@endif
</script>
<script src="{{asset('assets/libs/parsleyjs/i18n/'.app()->getLocale().'.js')}}"></script>
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
{{--<script type="text/javascript">--}}
{{--    window.ParsleyValidator.setLocale('{{app()->getLocale()}}');--}}
{{--</script>--}}
<script>
    $(window).on('load',function() {
        $('.full-loading').fadeOut(500);
    });
    $('form').on('submit',function () {
        @section('scroll')
        $("html, body").animate({
            scrollTop: 0
        }, 200);
        @show
        if ($(this).parsley().isValid()) {
            $('.full-loading').css('display','block');
            $('html, body').css({overflow: 'hidden'});
        } else {
            console.log('parsley form is not valid !!!');
        }
    });
</script>
