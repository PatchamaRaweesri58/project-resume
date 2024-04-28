<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="/backend/assets/" />
    <title>Rodyoktango</title>
    <meta charset="utf-8" />
    <meta property="robots" content="noindex, nofollow" />
    <meta property="googlebot" content="noindex, nofollow" />
    <meta property="description" content="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" sizes="32x32" type="image/webp" href="/images/logo-32x32.webp">
    <link rel="icon" sizes="192x192" type="image/webp" href="/images/logo-192x192.webp">
    <link rel="apple-touch-icon" type="image/webp" href="/images/logo-192x192.webp">
    <link rel="msapplication-TileImage" type="image/webp" href="/images/logo-180x180.webp">
    <link rel="shortcut icon" href="/images/logo-32x32.webp">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/backend/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Page Custom Styles(used by this page)-->
    @yield('styles')
    <!--end::Page Custom Styles-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        @yield('body_style_bg')
        @yield('content')
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "/backend/assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    {{-- <script src="/backend/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/backend/assets/js/scripts.bundle.js"></script> --}}
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    @yield('scripts')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
