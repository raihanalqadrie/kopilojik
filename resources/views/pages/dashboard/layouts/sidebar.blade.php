<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <i><img src="{{ asset('img/logo-2.png') }}" width="50"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Kopilojik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::Is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item {{ Request::Is('dashboard/categorys', 'dashboard/categorys/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard/categorys') }}">
            <i class="fas fa-table"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Catalogs -->
    <li class="nav-item {{ Request::Is('dashboard/catalogs', 'dashboard/catalogs/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard/catalogs') }}">
            <i class="fas fa-table"></i>
            <span>Katalog</span></a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item {{ Request::is('dashboard/products', 'dashboard/products/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard/products') }}">
            <i class="fas fa-table"></i>
            <span>Produk</span>
        </a>
    </li>


    <!-- Nav Item - Blogs -->
    <li class="nav-item {{ Request::Is('dashboard/blogs') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/blogs">
            <i class="fas fa-file-alt"></i>
            <span>Artikel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
