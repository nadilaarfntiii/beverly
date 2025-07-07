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
                                <form action="/penggajian/cetak" class="d-inline" target="_blank" method="post">
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
                                            <th>Id Karyawan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan</th>
                                            <th>Total</th>
                                    </thead>
                                        <tbody>
                                            <?php foreach ($penggajian as $row) : ?>
                                            <tr>
                                            <td><?php echo $row['kd_gaji']; ?></td>
                                            <td><?php echo $row['tanggal']; ?></td>
                                            <td><?php echo $row['id_karyawan']; ?></td>
                                            <td><?php echo $row['nm_krywn']; ?></td>
                                            <td><?php echo $row['gaji']; ?></td>
                                            <td><?php echo $row['tunjangan']; ?></td>
                                            <td><?php echo $row['total']; ?></td>
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