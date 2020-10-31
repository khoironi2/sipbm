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

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/koleksi') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        KEGIATAN
    </div>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/perbaikan') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Perbaikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Observasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_perbaikan') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Perbaikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_perawatan') ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Perawatan</span>
        </a>
    </li>

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
        <a class="nav-link pb-0" href="<?= base_url('admin/users') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->