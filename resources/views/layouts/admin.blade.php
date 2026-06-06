<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Dashboard') | CRUD App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />

    {{-- OverlayScrollbars --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />

    {{-- AdminLTE CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}" />

    {{-- ApexCharts CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />

    {{-- jsvectormap CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" />

    {{-- Custom Dashboard CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v={{ time() }}" />

    @yield('css')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        {{-- begin::Header --}}
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                {{-- Sidebar Toggle --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>

                {{-- Right Navbar --}}
                <ul class="navbar-nav ms-auto">
                    {{-- Fullscreen Toggle --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                        </a>
                    </li>

                    {{-- User Menu --}}
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <p>
                                    {{ Auth::user()->name }} - {{ ucfirst(Auth::user()->role) }}
                                    <small>{{ Auth::user()->email }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <form action="/logout" method="POST" id="logoutForm">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger float-end" id="btnLogout">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        {{-- end::Header --}}

        {{-- begin::Sidebar --}}
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="/dashboard" class="brand-link">
                    <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
                    <span class="brand-text fw-light">AdminLTE 4</span>
                </a>
            </div>

            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false">

                        {{-- Dashboard - Semua Role --}}
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link active" id="navDashboard">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        {{-- Menu Admin --}}
                        @if(Auth::user()->role == 'admin')
                            <li class="nav-header">ADMIN MENU</li>
                            <li class="nav-item">
                                <a href="/todo" class="nav-link" id="navTodo">
                                    <i class="nav-icon bi bi-list-check"></i>
                                    <p>Todo List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="navUsers">
                                    <i class="nav-icon bi bi-people-fill"></i>
                                    <p>Manage Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="navSettings">
                                    <i class="nav-icon bi bi-gear-fill"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                        @endif

                        {{-- Menu Staff --}}
                        @if(Auth::user()->role == 'staff')
                            <li class="nav-header">STAFF MENU</li>
                            <li class="nav-item">
                                <a href="/todo" class="nav-link" id="navTodo">
                                    <i class="nav-icon bi bi-list-check"></i>
                                    <p>Todo List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="navReports">
                                    <i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                                    <p>Reports</p>
                                </a>
                            </li>
                        @endif

                        {{-- Menu Customer --}}
                        @if(Auth::user()->role == 'customer')
                            <li class="nav-header">CUSTOMER MENU</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="navProfile">
                                    <i class="nav-icon bi bi-person-circle"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="navOrders">
                                    <i class="nav-icon bi bi-bag-check"></i>
                                    <p>My Orders</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>
        {{-- end::Sidebar --}}

        {{-- begin::Main Content --}}
        <main class="app-main">
            {{-- Content Header --}}
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('page-title', 'Dashboard')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Dashboard')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        {{-- end::Main Content --}}

        {{-- begin::Footer --}}
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <strong>Copyright &copy; 2024 <a href="#">AdminLTE</a>.</strong> All rights reserved.
        </footer>
        {{-- end::Footer --}}
    </div>

    {{-- OverlayScrollbars JS --}}
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>

    {{-- Popper.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>

    {{-- Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    {{-- AdminLTE JS --}}
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

    {{-- ApexCharts JS --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" crossorigin="anonymous"></script>

    {{-- jsvectormap JS --}}
    <script src="https://unpkg.com/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"></script>
    <script src="https://unpkg.com/jsvectormap@1.5.3/dist/maps/world.js"></script>

    {{-- Custom Dashboard JS --}}
    <script src="{{ asset('js/dashboard.js') }}?v={{ time() }}"></script>

    @yield('js')
</body>
</html>
