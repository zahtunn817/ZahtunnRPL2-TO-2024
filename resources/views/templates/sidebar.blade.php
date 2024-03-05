<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-squint"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasir Bahagia</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kasir
    </div>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pemesanan') }}">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Pemesanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transaksi') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Nav Item - Riwayat Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-book"></i>
            <span>Riwayat</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Riwayat terekam:</h6>
                <a class="collapse-item" href="{{ url('reservasi') }}">Pemesanan</a>
                <a class="collapse-item" href="{{ url('pembayaran') }}">Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Stok -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('stok') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Stok</span></a>
    </li>

    <!-- Nav Item - Menu Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Menu</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tags:</h6>
                <a class="collapse-item" href="{{ url('kategori') }}">Kategori</a>
                <a class="collapse-item" href="{{ url('jenis') }}">Jenis</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="{{ url('menu') }}">Menu</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - meja -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('meja') }}">
            <i class="fas fa-fw fa-chair"></i>
            <span>Meja</span></a>
    </li>

    <!-- Nav Item - pelanggan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pelanggan') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Nav Item - petugas -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('petugas') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Petugas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
