<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard_h">
<div class="sidebar-brand-icon rotate-n-0">
        <img src="<?= base_url('assets/img/logo-teh.png'); ?>" alt="Logo Teh" width="55" height="55">
    </div>
    <div class="sidebar-brand-text mx-3">HR Personalia <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="/dashboard_h">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url('karyawan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Karyawan</span></a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('kehadiran') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kehadiran</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('penggajian') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penggajian</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('permintaan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Permintaan</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan HRD </h6>
                        <a class="collapse-item" href="/karyawan/laporan">Karyawan</a>
                        <a class="collapse-item" href="/kehadiran/laporan">Kehadiran</a>
                        <a class="collapse-item" href="/penggajian/laporan">Penggajian</a>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="/charts_db">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan</span></a>
            </li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->