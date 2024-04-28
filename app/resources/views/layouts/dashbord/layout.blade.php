<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- Include CSS files -->
    @include('layouts.dashbord.partials.styles')
</head>

<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->
    <div id="wrapper">
        <!-- Include sidebar -->
        @include('layouts.dashbord.partials.sidebar')

        <!-- Start topbar header -->
        @include('layouts.dashbord.partials.header')

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Include content -->
                @yield('content')
            </div><!-- End container-fluid -->
        </div><!-- End content-wrapper -->

        <!-- Include footer -->
        @include('layouts.dashbord.partials.footer')

        <!-- Include color switcher -->
        @include('layouts.dashbord.partials.color-switcher')
    </div><!-- End wrapper -->

    <!-- Include JS files -->
    @include('layouts.dashbord.partials.scripts')
</body>

</html>
