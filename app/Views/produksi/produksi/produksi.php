<?= $this->extend('layouts/admin_pr') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Master Produksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_p">Home</a></li>
                        <li class="breadcrumb-item active">Data Master Produksi</li>
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
                            <a href="produksi/create" class="btn btn-primary float-right">Tambah Produksi</a>
                            <h5>
                                Daftar Produksi
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Kode Produksi</th>
                                            <th>ID Karyawan</th>
                                            <th>Tanggal Produksi</th>
                                            <th>ID Barang</th>
                                            <th>Total Produksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produksi as  $row) { ?>
                                        <tr>
                                            <td><?php echo $row['kode_produksi']; ?></td>
                                            <td><?php echo $row['id_karyawan']; ?></td>
                                            <td><?php echo $row['tanggal_produksi']; ?></td>
                                            <td><?php echo $row['id_brg']; ?></td>
                                            <td><?php echo $row['total_produksi']; ?> Ton</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('produksi/edit/' . $row['kode_produksi']); ?>"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('produksi/delete/' . $row['kode_produksi']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
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