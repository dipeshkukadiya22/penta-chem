<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="javascript:void(0)"><span class="">

                            <img src="{{ url('app-assets/images/logo/Logo.svg') }}" />
                        </span>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">

            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">
                                @if (auth()->user())
                                    {{ auth()->user()->name }}
                                @endif
                            </span><span class="user-status">Admin</span></div><span class="avatar">
                            <div class="round">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        </span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a
                            class="dropdown-item" href="{{route('destroy')}}"><i class="me-50" data-feather="power"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border"
            role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand"
                            href="../../../html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%"
                                            x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                            x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path"
                                                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                    style="fill:currentColor"></path>
                                                <path id="Path1"
                                                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                    fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                </polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                </polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)"
                                                    opacity="0.099999994"
                                                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                            data-bs-toggle="collapse"><i
                                class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                    <li class="nav-item  {{request()->is('admin/viewallproducts') ? 'active':''}}"><a class="nav-link d-flex align-items-center" href="{{route('viewallproducts')}}"><i
                                data-feather="hexagon"></i><span data-i18n="Home">Products</span></a></li>

                    <li class="nav-item {{request()->is('admin/productcategory') ? 'active':''}}"><a class="nav-link d-flex align-items-center" href="{{route('technicalspectitle')}}"><i
                                data-feather="droplet"></i><span data-i18n="Home">Technical Specifications Title</span></a></li>

                    <li class="nav-item {{request()->is('admin/productsubcategory') ? 'active':''}}"><a class="nav-link d-flex align-items-center" href="{{route('technicalspec')}}"><i
                                data-feather="command"></i><span data-i18n="Home">Technical Specifications</span></a></li>

                    <li class="nav-item {{ request()->is('admin/downloadpdf') ? 'active' : '' }} "><a class="nav-link d-flex align-items-center" href="{{route('downloadpdfdata')}}"><i
                                    data-feather="file-plus"></i><span data-i18n="Home">Download PDF Data</span></a></li>

                    <li class="nav-item {{ request()->is('admin/allusers') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('users')}}"><i
                                data-feather="user"></i><span data-i18n="Home">System Users</span></a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2025<a
                    class="ms-25" href="#" target="_blank">AACIPL</a><span class="d-none d-sm-inline-block">,
                    All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made
                with<i data-feather="heart"></i> by <a href="#">TEQUE7</a></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{url('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{url('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{url('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{url('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

  <!-- END: Content-->
      <!-- BEGIN: Page Vendor JS-->
      <script src="{{url('/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
      <script src="{{url('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
      <!-- END: Page Vendor JS-->
       <!-- BEGIN: Page JS-->
    <script src="{{url('/app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
    <script src="{{url('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{url('/app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <!-- END: Page JS-->

</html>
