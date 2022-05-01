<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>داشبرد | کنترل پنل مدیریت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('PageElements.dashboard.Shared.Css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">پنل</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
            </a>

            @include('PageElements.dashboard.Shared.TopBar')

        </header>

        @include('PageElements.dashboard.Shared.Menus')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                    {{ $Name }}
                    <small>{{ $Section }}</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                @include('PageElements.dashboard.Shared.StatBoxes')

                <!-- Main Contents -->
                @yield('contents')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-left">
            <strong>CopyRight &copy; 2020-2021 <a>Iraj Azarvand</a> </strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    @include('PageElements.dashboard.Shared.Js')


</body>

</html>
