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
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('blocks.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('blocks.index') }}" class="nav-link {{ request()->routeIs('blocks.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Blocks
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blocks.index') }}" class="nav-link {{ request()->routeIs('blocks.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Blocks</p>
                            </a>
                        </li>

                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('blocks.create') }}" class="nav-link {{ request()->routeIs('blocks.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Blocks</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('blocks.integrity.index') }}" class="nav-link {{ request()->routeIs('blocks.integrity.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Check Integrity</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('boxes.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('boxes.index') }}" class="nav-link {{ request()->routeIs('boxes.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Boxes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('boxes.index') }}" class="nav-link {{ request()->routeIs('boxes.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Boxes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('boxes.create') }}" class="nav-link {{ request()->routeIs('boxes.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Box</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('tools.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('tools.key.generate') }}" class="nav-link {{ request()->routeIs('tools.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Tools
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tools.key.generate') }}" class="nav-link {{ request()->routeIs('tools.key.generate') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generate Key</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tools.key.verify.index') }}" class="nav-link {{ request()->routeIs('tools.key.verify.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verify Key</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li class="nav-header">ADMINISTRATOR</li>

                    <li class="nav-item {{ request()->routeIs('users.*') ? 'menu-open' : '' }}">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="nav-header">PERSONAL</li>

                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
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