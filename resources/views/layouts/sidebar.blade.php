<aside class="main-sidebar sidebar-dark-success elevation-4">
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-text">Tennis Fights</span>
        </a>
    </div>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info d-flex">
                <div class="user-name-role">
                    <a href="{{ route('admin.userProfile') }}">{{ Auth::user()->fullName ? Auth::user()->fullName : 'Admin Name' }}</a><br>
                    <a href="{{ route('admin.userProfile') }}">{{ ucfirst(Auth::user()->role ? Auth::user()->role : 'Admin role') }}</a>
                </div>
                <i class="right fa fa-ellipsis-v fa-2x dotted-icon"></i>
                <div class="user-detail">
                    <a href="{{ route('manageAdministration') }}" class="btn">Manage Administrators</a>
                    <hr>
                    <a href="{{route('logout')}}" class="btn">Log out</a>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.notifications') }}" class="nav-link {{ Request::path() == 'notifications' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-bell"></i>
                        <p>App Notifications</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::path() == 'active-user' || Request::path() == 'blocked-user' || Request::path() == 'deleted-user' ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('activeUser') }}" class="nav-link {{ Request::path() == 'active-user' ? 'active' : '' }}">
                                <p>Active Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blockedUser') }}" class="nav-link {{ Request::path() == 'blocked-user' ? 'active' : '' }}">
                                <p>Blocked Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('deletedUser') }}" class="nav-link {{ Request::path() == 'deleted-user' ? 'active' : '' }}">
                                <p>Deleted Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-egg"></i>
                        <p>Purchase History</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Seasons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.termsConditions') }}" class="nav-link {{ Request::path() == 'terms-condition' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Terms $ Conditions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.privacyPolicy') }}" class="nav-link {{ Request::path() == 'privacy-policy' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Privacy Policy</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
