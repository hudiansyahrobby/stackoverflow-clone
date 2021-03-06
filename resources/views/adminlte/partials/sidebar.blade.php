<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        {{-- <img src="{{asset('/adminLTE/dist/img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">
            <center><b>- F H Y -</b></center>
        </span>
    </a>

    @if(Auth::check())
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{-- <div class="image">
          <img src="{{ asset('/adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle
                elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
                <a class="d-block">
                    <center>Welcome , {{ Auth::user()->name }}</center>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/myProfile/{{ Auth::user()->id }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/myQuestion/{{ Auth::user()->id }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            My Questions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
    @else
        <p class="text-white text-center mt-2">You're Not Sign In</p>
    @endif
    <!-- Sidebar -->

    <!-- /.sidebar -->
</aside>
