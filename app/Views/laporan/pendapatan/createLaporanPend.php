<?= $this->extend('layouts/admin_keu') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Buat Laporan Pendapatan </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Buat Laporan Pendapatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col me-2 pb-3">

                                <form class="d-flex float-right" role="search" action="/laporan/pendapatan/laporan_pendapatan" method="POST">
                                    <select name="search" class="select2_single form-control mx-2 w-100 " value="">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>

                                    </select>
                                    <button class="btn btn-outline-success cari" type="submit">Filter</button>
                                </form>
                            </div>
                            <h5 class="m-0 font-weight-bold text-primary">
                                 Laporan Pendapatan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                <thead>
                                        <tr class="text-center">
                                            <th>ID Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($laporanPendapatan as $pend) :
                                    ?>
                                        <tr class="text-center">
                                            <td>
                                                <?= $pend['id_transaksi']; ?>
                                            </td>
                                            <td>
                                                <?= $pend['tanggal']; ?>
                                            </td>
                                            <td>
                                                <?= $pend['keterangan']; ?>
                                            </td>
                                            <td>
                                                Rp<?= number_format($pend['nominal'], 0, ',', '.'); ?>
                                            </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?= base_url(); ?>lap_pend" class="btn btn-secondary float-left">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>