@include('dashboard.layouts.shared.includes.main')

<head>
    @yield('title')
    @include("dashboard.layouts.shared.includes.head-css")

    @yield('styles')


</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Language Dropdown -->
    <div class="locale">
        <div class="position-absolute top-0 end-0 m-3" style="z-index: 1;">
            <div class="dropdown ms-1 topbar-head-dropdown header-item">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="header-lang-img" src="{{ asset('dashboard/assets/images/flags/' . (app()->getLocale() == 'ar' ? 'sa' : 'us') . '.svg') }}" alt="{{ __('Header Language') }}" height="20" class="rounded">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item - English -->
                    @if(app()->getLocale() == 'ar')
                    <a href="#" onclick="document.getElementById('enForm').submit()" class="dropdown-item notify-item language py-2" data-lang="en" title="{{ __('English') }}">
                        <img src="{{ asset('dashboard/assets/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                        <span class="align-middle">{{ __('English') }}</span>
                    </a>
                    @else
                    <!-- item - Arabic -->
                    <a href="#" onclick="document.getElementById('arForm').submit()" class="dropdown-item notify-item language" data-lang="ar" title="{{ __('Arabic') }}">
                        <img src="{{ asset('dashboard/assets/images/flags/sa.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                        <span class="align-middle">{{ __('Arabic') }}</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <form type="hidden" class="d-none" action="{{ route('changeLocale') }}" method="post" id="arForm">
            @csrf
            <input type="text" name="lang" value="ar" required />
        </form>
        <form type="hidden" class="d-none" action="{{ route('changeLocale') }}" method="post" id="enForm">
            @csrf
            <input type="text" name="lang" value="en" required />
        </form>
    </div>
    <!-- start plan -->
    <section class="section bg-light" id="plans">
        <div class="bg-overlay bg-overlay-pattern"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-semibold">{{ __('Choose the Right Plan for You') }}</h3>
                        <p class="text-muted mb-4">{{ __('Simple Pricing. No Hidden Fees. Advanced Features for Your Business.') }}</p>

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row gy-4">
                @foreach($subscriptionPlans as $plan)
                <div class="col-lg-4">
                    <div class="card plan-box mb-0">
                        <div class="card-body p-4 m-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fw-semibold">{{$plan->name}}</h5>
                                </div>
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary">
                                        <i class="ri-book-mark-line fs-20"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4 text-center">
                                <h1 class="month"><sup><small>{{__('SAR')}}</small></sup><span class="ff-secondary fw-bold">{{$plan->price}}</span> <span class="fs-13 text-muted">{{__('/Year')}}</span></h1>
                            </div>
                            <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">


                                <p style="font-family: IBM Plex Sans Arabic, sans-serif; font-size: 16px;">
                                    {{$plan->description}}
                                </p>

                                @foreach($plan->features as $feature)
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 {{ $feature->status_id == \App\Models\Status::ACTIVE ? 'text-success' : 'text-danger' }} me-1">
                                            <i class="ri-{{ $feature->status_id == \App\Models\Status::ACTIVE ? 'checkbox-circle-fill' : 'close-circle-fill' }} fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            {{ $feature->name }}
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>

                            <div>
                                <div class="mt-4">
                                    <form method="POST" action="{{route('plan.subscribe',$plan->id)}}">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="{{__('Your Email')}}" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-soft-success w-100">{{ __('Subscribe') }}</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--end row-->
        </div>
        <!-- end container -->
    </section>
    <!-- end plan -->


    <!--start back-to-top-->
    @include("dashboard.layouts.shared.includes.vendor-scripts")
</body>

</html>