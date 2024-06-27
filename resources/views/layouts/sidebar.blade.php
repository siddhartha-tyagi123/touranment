<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Touranment<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('clubs.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Club</span></a>
    </li>
    <!-- Dropdown Example -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('club.contact.info') }}">Club Contact</a>
        </div>

    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('touranments.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tournament</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tournament.category.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tournament Category</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('teams.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Teams</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pictures.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Picture</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('users.index') }}">Club User</a>
        </div>

    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile', ['id' => auth()->user()->id]) }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>