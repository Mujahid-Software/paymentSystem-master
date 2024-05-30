<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box mt-4">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span id="sidebar-span">{{ __('Menu') }}</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{route('dashboard.index')}}" aria-expanded="false" aria-controls="sidebarDashboard">
                        <i class="ri-dashboard-2-line"></i> <span id="sidebar-span">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.subscriptionPlans.*') ? 'active' : '' }}" href="{{route('dashboard.subscriptionPlans.index')}}" aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ri-function-line"></i> <span id="sidebar-span">{{ __('Subscription Plans') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.payments.*') ? 'active' : '' }}" href="{{route('dashboard.payments.index')}}" aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ri-bank-card-line"></i> <span id="sidebar-span">{{ __('Payments') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.marchants.*') ? 'active' : '' }}" href="{{route('dashboard.marchants.index')}}" aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ri-bank-card-line"></i> <span id="sidebar-span">{{ __('Marchants') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}" href="{{route('dashboard.users.index')}}" aria-expanded="false" aria-controls="sidebarTasks">
                        <i class="ri-user-2-line"></i> <span id="sidebar-span">{{ __('Users') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>