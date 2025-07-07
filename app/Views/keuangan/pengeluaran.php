<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend('/layouts/admin_keu');?>
<?php $this->section('content');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Pengeluaran </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pengeluaran</li>
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
                            <a href="pengeluaran/create" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Pengeluaran</a>
                            <?php if (session()->getFlashdata('pesan')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
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
                                            <th>Kategori</th>
                                            <th>Bukti Transaksi</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($pengeluaran as $pg) :
                                    ?>
                                        <tr class="text-center">
                                            <td>
                                                <?= $pg['id_transaksi']; ?>
                                            </td>
                                            <td>
                                                <?= $pg['tanggal']; ?>
                                            </td>
                                            <td>
                                                <?= $pg['keterangan']; ?>
                                            </td>
                                            <td>
                                                Rp<?= number_format($pg['nominal'], 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <?= $pg['keterangan_kategori']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('berkas/' . $pg['berkas']); ?>" target="_blank"><?= $pg['berkas']; ?></a>
                                            </td>
                                            <td>
                                                <?= $pg['nama_user']; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group d-flex justify-content-center">
                                                    <a href="<?php echo base_url('pengeluaran/ubah/' . $pg['id_transaksi']); ?>"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group d-flex justify-content-center">
                                                    <a href="<?php echo base_url('pengeluaran/delete/' . $pg['id_transaksi']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
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
<?= $this->endSection(); ?>