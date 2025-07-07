<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Laporan Permintaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_hr">Home</a></li>
                        <li class="breadcrumb-item active">Data Laporan Permintaan</li>
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
                            <a href="permintaan/create" class="btn btn-primary float-right">Tambah Data</a>
                            <h5>Data Laporan Permintaan Penggajian</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Dokumen</th>
                                            <th>Status</th>
                                            <th>ID Gaji</th>
                                            <th>Pengirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($permintaan as $row) { ?>
                                        <tr>
                                            <td><?= $row->kode; ?></td>
                                            <td><?= $row->tgl_permintaan; ?></td>
                                            <td><?= $row->berkas; ?></td>
                                            <td><?= $row->status; ?></td>
                                            <td><?= $row->kd_gaji; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('permintaan/edit/' . $row->kode); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('permintaan/delete/' . $row->kode); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
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
