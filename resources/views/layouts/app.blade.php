<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Astrolifeguide') }}</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="{{ asset('astrolifeguide') }}/img/brand/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <script src="https://kit.fontawesome.com/fef88c5b09.js" crossorigin="anonymous"></script>
        {{-- Styles --}}

        <link href="{{ asset('astrolifeguide') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/animate.css">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/fonts.css">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/owl.carousel.css">
        {{--  <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/owl.theme.default.css">--}}
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/reset.css">

        <link type="text/css"  rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/mdb.css">
        <link type="text/css"  rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/bootstrap.css">
{{--        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">--}}
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/style.css">
        <link rel="stylesheet" href="{{ asset('astrolifeguide') }}/css/responsive.css">

        {{-- Scripts --}}

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>



        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <main class="py-4" style="clear: both;">
                @yield('content')
                @include('layouts.footers.guest')
            </main>
        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>


        <script src="{{ asset('astrolifeguide') }}/js/popper.js"></script>
        <script src="{{ asset('astrolifeguide') }}/js/jquery.menu-aim.js"></script>
        <script src="{{ asset('astrolifeguide') }}/js/owl.carousel.js"></script>
        <script src="{{ asset('astrolifeguide') }}/js/jquery.inview.min.js"></script>
        <script src="{{ asset('astrolifeguide') }}/js/jquery.magnific-popup.js"></script>
        <script src="{{ asset('astrolifeguide') }}/js/custom.js"></script>
        <script src="{{ asset('mdb') }}/js/bootstrap.js"></script>
        <script src="{{ asset('mdb') }}/js/mdb.js"></script>

        @stack('js')




        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var SITEURL = '{{URL::to('')}}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '#submit', function(e){
                var totalAmount = $(this).attr("data-amount");
                var product_id =  $(this).attr("data-id");
                var options = {
                    "key": "rzp_test_z5kb0FfffJDWuT",
                    "amount": (totalAmount), // 2000 paise = INR 20
                    "name": "astrolifeguide",
                    "description": "Payment",
                    "image": "https://www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
                    "handler": function (response){
                        $.ajax({
                            url: SITEURL + 'paysuccess',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id ,
                                totalAmount : totalAmount ,product_id : product_id,
                            },
                            success: function (msg) {

                                window.location.href = SITEURL + 'razor-thank-you';
                            }
                        });

                    },
                    "prefill": {
                        "contact": '9959982432',
                        "email":   'info@astrolifeguide.com',
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
            });

        </script>


        @yield('footer_scripts')
    </body>
</html>