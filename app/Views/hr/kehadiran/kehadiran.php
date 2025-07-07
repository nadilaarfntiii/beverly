<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Kehadiran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_h">Home</a></li>
                        <li class="breadcrumb-item active">Data Kehadiran</li>
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
                                Data Kehadiran Karyawan PT Beverly
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Kode Absen</th>
                                            <th>Id Karyawan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jam masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Tanggal</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kehadiran as  $row) { ?>
                                        <tr>
                                            <td><?php echo $row['kd_absen']; ?></td>
                                            <td><?php echo $row['id_karyawan']; ?></td>
                                            <td><?php echo $row['nm_krywn']; ?></td>
                                            <td><?php echo $row['jam_masuk']; ?></td>
                                            <td><?php echo $row['jam_pulang']; ?></td>
                                            <td><?php echo $row['tanggal']; ?></td>
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