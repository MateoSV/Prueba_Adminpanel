<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="brand-text font-weight-light" style="color: rgba(255, 255, 255, 0.8);">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li>
                    <a href="{{ url('/companies') }}" class="nav-link">
                      {{--  <i class="fas fa-building"></i>--}}
                        <p>
                            @lang('companies.companies')
                        </p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/employees') }}" class="nav-link">
                      {{--  <i class="fas fa-building"></i>--}}
                        <p>
                            @lang('employees.employees')
                        </p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}" class="nav-link">
                        {{--  <i class="fas fa-building"></i>--}}
                        <p>
                            @lang('base.logout')
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
