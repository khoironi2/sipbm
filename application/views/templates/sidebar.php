<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Museum</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA MASTER
    </div>

    <!-- Nav Item - admin area Tables -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('users/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('koleksi/koleksi') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('observasi/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('petugas/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>
    <!-- Nav Item - end admin area Tables -->

    <!-- Nav Item -  pihak pusat area Tables -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/koleksi/koleksi') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
    </li>
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/observasi/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/petugas/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>
    <!-- Nav Item -  end pihak pusat area Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        KEGIATAN
    </div>
    <!-- start area admin -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/perbaikan') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Perbaikan</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <!-- end area admin -->

    <!-- start area pihak pusat -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/admin/perbaikan') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Perbaikan</span>
        </a>
    </li>
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/admin/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <!-- end area pihak pusat -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <!-- start area admin -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Observasi</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_perbaikan') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Perbaikan</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_perawatan') ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Perawatan</span>
        </a>
    </li>

    <!-- end area admin -->

    <!-- start area pihak pusat -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/admin/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <!-- end area pihak pusat -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        ADMIN PANEL
    </div>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/profile') ?>">
            <i class="fas fa-fw fa-edit"></i>
            <span>Edit Profile</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('Auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->