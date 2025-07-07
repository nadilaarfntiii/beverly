<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?= $this->extend('layouts/admin_keu') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Pengeluaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Pengeluaran</li>
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
                            <a href="/laporan/pengeluaran/createLaporanPeng" class="btn btn-primary float-right">Buat Laporan</a>
                            <h5 class="m-0 font-weight-bold text-primary">
                                Laporan Pengeluaran
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
                                        foreach ($laporanPengeluaran as $peng) :
                                    ?>
                                        <tr class="text-center">
                                            <td>
                                                <?= $peng['id_transaksi']; ?>
                                            </td>
                                            <td>
                                                <?= $peng['tanggal']; ?>
                                            </td>
                                            <td>
                                                <?= $peng['keterangan']; ?>
                                            </td>
                                            <td>
                                                Rp<?= number_format($peng['nominal'], 0, ',', '.'); ?>
                                            </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>