<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ @route('dashboard') }}" class="brand-link">
        <span class="brand-text">
            <b>Block</b>Box
        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">PERSONAL</li>

                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>

                    <a
                        href="{{ route('logout') }}"
                        class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
