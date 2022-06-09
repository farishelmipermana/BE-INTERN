<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Superadmin</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('super.dashboard.index') }}"
                    class="nav-link {{ Request::is('*/dashboard*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('super.users.index') }}"
                    class="nav-link {{ Request::is('*/users*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>
            <li class="nav-item {{Request::is('*/credentials*') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{Request::is('*/credentials*') ? 'active' : ''}}">
                    <i class="nav-icon fas fas fa-user-lock"></i>
                    <p>
                        Kredensial
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('super.credentials.admin.index')}}" class="nav-link {{Request::is('*/credentials/admin*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('super.credentials.stakeholder.index')}}" class="nav-link {{Request::is('*/credentials/stakeholder*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stakeholder</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('super.vehicles.index') }}"
                    class="nav-link {{ Request::is('*/vehicles*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>
                        Kendaraan
                    </p>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <form action="{{route('auth.super.logout')}}" method="POST">
                @csrf
                <button type="submit" class="nav-link {{ Request::is('*suppliers*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </button>
            </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
