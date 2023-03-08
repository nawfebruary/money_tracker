<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!-- <link rel="shortcut icon" href="assets/media/logos/logo-light-icon.png" /> -->

    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    {{--  <link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />  --}}
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    {{--  <script src="assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>  --}}
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/widgets.bundle.js"></script>
    {{--  <script src="assets/js/custom/widgets.js"></script>  --}}
    {{--  <script src="assets/js/custom/apps/chat/chat.js"></script>  --}}
    {{--  <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>  --}}
    <script type="text/javascript" src="assets/js/style.js"></script>
    <!--end::Page Custom Javascript-->

    <script src="assets/js/chart-2-9-3.js"></script>
    <!--end::Javascript-->


</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed  toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:0px;--kt-toolbar-height-tablet-and-mobile:0px">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.sidebar')
            <!-- Page Content -->
            <main class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.navigation')
                {{ $slot }}
                @yield('scripts')
            </main>

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

</body>

</html>
