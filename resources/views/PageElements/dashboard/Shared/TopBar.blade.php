<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('DashboardCssJs/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('DashboardCssJs/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                        <p>
                            {{ Auth::user()->name }}
                            <small>مدیریت کل سایت</small>
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <div class="pull-left">
                                    <button class="btn btn-default btn-flat" type="submit">خروج</button>
                                </div>
                        </form>

                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
