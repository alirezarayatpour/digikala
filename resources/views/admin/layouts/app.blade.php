<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png') }}" sizes="16x16" href="{{ asset('backend/backend/assets/images/favicon.png') }}')}}'">
    <title> پنل مدیریت - @section('title') @show</title>
    <!-- Custom CSS -->
    <link href="{{ asset('backend/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
{{--    <!--[if lt IE 9]>--}}
{{--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
{{--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
{{--<![endif]-->--}}
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('admin.layouts.header')

        @include('admin.layouts.aside')

        <div class="page-wrapper">

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

    </div>

    @include('admin.layouts.customizer')

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <script src="{{ asset('backend/dist/js/tinymce.min.js')}}"></script>
    <script src="{{ asset('backend/dist/js/script.js')}}"></script>
    <!-- ============================================================== -->
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{ asset('backend/dist/js/app.min.js')}}"></script>
    <script src="{{ asset('backend/dist/js/app.init.js')}}"></script>
    <script src="{{ asset('backend/dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('backend/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 charts -->
    <script src="{{ asset('backend/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{ asset('backend/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('backend/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <script src="{{ asset('Backend/dist/js/sweetalert2.js')}}"></script>

</body>

</html>
