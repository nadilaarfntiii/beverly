<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard_p">
<div class="sidebar-brand-icon rotate-n-0">
        <img src="<?= base_url('assets/img/logo-teh.png'); ?>" alt="Logo Teh" width="55" height="55">
    </div>
    <div class="sidebar-brand-text mx-3">PRODUKSI <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>
<hr class="sidebar-divider">
<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('/laporan/laporan_produksi') ?>">Produksi</a>
            <a class="collapse-item" href="<?= base_url('/laporan/laporan_pengajuan') ?>">Ajukan Stok</a>
            <a class="collapse-item" href="<?= base_url('/laporan/laporan_masuk') ?>">Stok Masuk</a>
            <a class="collapse-item" href="<?= base_url('/laporan/laporan_stok') ?>">Stok Real</a>
        </div>
</div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
        aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Stok</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('/pengajuan/pengajuan') ?>">Ajukan Stok</a>
            <a class="collapse-item" href="<?= base_url('stokMasuk') ?>">Stok Masuk</a>
            <a class="collapse-item" href="<?= base_url('stok_real') ?>">Stok Real</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
        aria-controls="collapseFive">
        <i class="fas fa-fw fa-cog"></i>
        <span>Karyawan</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('produksiKaryawan') ?>">Total Produksi</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('produksi') ?>">Kelola Produksi</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->