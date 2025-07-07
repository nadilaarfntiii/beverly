<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_h">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
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
                            <h5>
                                <?= $title; ?>
                                <form action="/permintaan/cetak" class="d-inline" target="_blank" method="post">
                                    <button type="submit" class="btn btn-primary float-right">Cetak Laporan</button>
                                </form>
                            </h5>
                            
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
                                    </thead>
                                        <tbody>
                                            <?php foreach ($permintaan as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['kode']; ?></td>
                                                <td><?php echo $row['tgl_permintaan']; ?></td>
                                                <td><?php echo $row['berkas']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
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