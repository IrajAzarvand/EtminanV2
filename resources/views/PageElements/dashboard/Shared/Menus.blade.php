<!-- right side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ asset('DashboardCssJs/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>

            @if (Auth::user()->role_id == 1)
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>داشبرد</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>داشبرد</a></li>
                        <li><a target="_blank" href="{{ route('MainWebsite') }}"><i class="fa fa-dashboard"></i>مشاهده در وب سایت اصلی</a></li>
                    </ul>
                </li>
            @endif
            @foreach (DashboardMenus() as $main => $sub)
                <li class=" active treeview">
                    <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>{{ $main }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach ($sub as $name => $url)
                            <li><a href="{{ route($url) }}"><i class="fa fa-circle-o"></i>{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
