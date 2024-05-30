@php
if (!session()->has('name') || !session()->has('email')) {
abort(403);
}
@endphp

@include("dashboard.layouts.shared.includes.main")

<head>
    @yield('title')
    @include("dashboard.layouts.shared.includes.head-css")
    <!-- Moyasar Styles -->

    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.10.0/moyasar.css" />

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.10.0/moyasar.js"></script>

    <link href="{{asset('dashboard/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
   
    <!-- Begin page -->
    <div class="layout-wrapper landing">

        <section class="section" id="home">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <div class="mysr-form" data-price="{{ $subscriptionPlan->price }}" data-description="{{ $subscriptionPlan->description }}"></div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var formElement = document.querySelector('.mysr-form');
                                    var price = formElement.getAttribute('data-price');
                                    var description = formElement.getAttribute('data-description');

                                    Moyasar.init({
                                        element: '.mysr-form',
                                        amount: price * 100,
                                        currency: 'SAR',
                                        description: description,
                                        publishable_api_key: 'pk_test_AQpxBV31a29qhkhUYFYUFjhwllaDVrxSq5ydVNui',
                                        callback_url: 'https://moyasar.com/thanks',
                                        methods: ['creditcard'],
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- end container -->
        </section>


    </div>
    <!-- end layout wrapper -->

    @include("dashboard.layouts.shared.includes.vendor-scripts")




    <!--Swiper slider js-->
    <script src="{{asset('dashboard/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

    <!-- landing init -->
    <script src="{{asset('dashboard/assets/js/pages/landing.init.js')}}"></script>
</body>

</html>