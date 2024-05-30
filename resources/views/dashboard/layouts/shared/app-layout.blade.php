@include("dashboard.layouts.shared.includes.main")

<head>
    @yield('title')
    @include("dashboard.layouts.shared.includes.head-css")
    @yield('styles')
</head>

<body>
    <div id="layout-wrapper">
        @include("dashboard.layouts.shared.includes.menu")
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('page-title')
                    @yield('content')
                </div>
            </div>
            @include("dashboard.layouts.shared.includes.footer")
        </div>
    </div>
    @include("dashboard.layouts.shared.includes.vendor-scripts")
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
    @yield('scripts')
</body>