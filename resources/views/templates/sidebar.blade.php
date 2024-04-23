<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-squint"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cafe <sup>SE2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @auth

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><b>Dashboard</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pemesanan & Transaksi
    </div>

    <!-- Nav Item - Pemesanan meja -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('pemesanan') }}">
    <i class="fas fa-fw fa-clipboard-check"></i>
    <span><b>Pemesanan meja</b></span></a>
    </li> --}}
    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transaksi') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span><b>Transaksi</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Absensi
    </div>

    <!-- Nav Item - Absensi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('absensi') }}">
            <i class="fas fa-fw fa-clock"></i>
            <span><b>Absensi</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Stok
    </div>

    <!-- Nav Item - Stok -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('stok') }}">
            <i class="fas fa-fw fa-box-open"></i>
            <span><b>Stok</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Data
    </div>

    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('menu') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span><b>Menu</b></span></a>
    </li>
    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('titipan') }}">
            <i class="fas fa-fw fa-box"></i>
            <span><b>Produk Titipan</b></span></a>
    </li>
    <!-- Nav Item - Labels Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-tag"></i>
            <span><b>Labels</b></span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('jenis') }}">Jenis</a>
                <a class="collapse-item" href="{{ url('kategori') }}">Kategori</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Meja -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('meja') }}">
            <i class="fas fa-fw fa-utensils"></i>
            <span><b>Meja</b></span></a>
    </li>
    <!-- Nav Item - Pelanggan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pelanggan') }}">
            <i class="fas fa-fw fa-users"></i>
            <span><b>Pelanggan</b></span></a>
    </li>
    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span><b>User</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Kelola laporan Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span><b>Kelola laporan</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('dataPemesanan') }}">Pemesanan</a>
                <a class="collapse-item" href="{{ url('dataTransaksi') }}">Transaksi</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Laporan pemesanan -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('laporanPemesanan') }}">
    <i class="fas fa-fw fa-clipboard-check"></i>
    <span><b>Laporan pemesanan</b></span></a>
    </li> --}}
    <!-- Nav Item - Laporan transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('laporanTransaksi') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span><b>Laporan transaksi</b></span></a>
        {{-- </li>
    <!-- Nav Item - Riwayat -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('riwayat') }}">
        <i class="fas fa-fw fa-clock"></i>
        <span><b>Riwayat</b></span></a>
    </li> --}}

    @else
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cafe SE2
    </div>
    @endauth

    <!-- Nav Item - About -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">
            <i class="fas fa-fw fa-info"></i>
            <span><b>Tentang aplikasi</b></span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>