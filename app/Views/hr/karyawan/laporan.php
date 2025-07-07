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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <form action="/karyawan/cetak" class="d-inline" target="_blank" method="post">
                                    <button type="submit" class="btn btn-primary float-right">Cetak Laporan</button>
                                </form>
                            </h5>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Id Karyawan</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                    </thead>
                                        <tbody>
                                            <?php foreach ($karyawan as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['id_karyawan']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['jekel']; ?></td>
                                                <td><?php echo $row['tgl_lahir']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['no_hp']; ?></td>
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