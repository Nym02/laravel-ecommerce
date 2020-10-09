<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.includes.header')

    @include('Backend.includes.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('Backend.includes.topbar')

    @include('Backend.includes.nav')

    @yield('adminBodyContent')



    @include('Backend.includes.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@include('Backend.includes.script')
</body>
</html>
