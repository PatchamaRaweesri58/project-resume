<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Vector CSS -->
    {{-- <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" /> --}}
    <!-- simplebar CSS-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />
    @yield('style')
</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            {{-- <div class="brand-logo">
                <a href="index.blade.php">
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Dashtreme Admin</h5>
                </a>
            </div> --}}
            <ul class="sidebar-menu do-nicescrol">
                <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
                    <div class="brand-logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                            <h5 class="logo-text">Dashtreme Admin</h5>
                        </a>
                    </div>
                    <ul class="sidebar-menu do-nicescrol">
                        <li class="sidebar-header">MAIN NAVIGATION</li>

                        <li>
                            <a href="{{ route('datatables') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.st') }}">
                                <i class="zmdi zmdi-grid"></i> <span>List:Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.education') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Education</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.skills') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Skills</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.listskillsController') }}">
                                <i class="zmdi zmdi-grid"></i> <span>List:Skills</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.experience') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Experience</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.listexperience') }}">
                                <i class="zmdi zmdi-grid"></i> <span>List:Experience</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.featured') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Featured</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.listfeatured') }}">
                                <i class="zmdi zmdi-grid"></i> <span>List:Featured</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('datatables.certificate') }}">
                                <i class="zmdi zmdi-grid"></i> <span>Certificate</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-header">LABELS</li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="zmdi zmdi-share text-info"></i> <span>Information</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>

            </ul>

        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <div class="content-wrapper">
            <!--Start topbar header-->
            @include('layouts.backend.admin.header')
            <!--End topbar header-->
        
            <div class="clearfix"></div>
        
            <div class="container">
                <div class="row justify-content-center">
                    
                        <div class="container-fluid d-flex justify-content-center align-items-center">
                            @yield('content')
                        </div>
                   
                </div>
            </div>
        
            <div class="overlay toggle-menu"></div>
        </div>
        
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
        
        <!--Start footer-->
        @include('layouts.backend.admin.footer')
        <!--End footer-->
        
        <!--start color switcher-->
        <div class="right-sidebar">
            <!-- Content of color switcher goes here -->
        </div>
    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- loader scripts -->
    {{-- <script src="{{asset('assets/js/jquery.loading-indicator.js')}}"></script> --}}
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>
    <!-- Chart js -->

    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>

    <!-- Index js -->
    {{-- <script src="{{asset('assets/js/index.js')}}"></script> --}}

    @yield('script')
</body>

</html>
