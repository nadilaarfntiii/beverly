<?= $this->extend('layouts/admin_keu') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Pendapatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Pendapatan</li>
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
                            <h5 class="m-0 font-weight-bold text-primary">
                                Laporan Pendapatan <?= format_bulan($bulan); ?>
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
                            <a href="/laporan/pendapatan/createLaporanPend" class="btn btn-secondary float-left">Kembali</a>
                            <form action="/laporan/pendapatan/cetak_pend" class="d-inline" target="_blank" method="post">
                                <input type="hidden" name="bulan" value="<?= $bulan; ?>">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-print"></i> Cetak Laporan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>