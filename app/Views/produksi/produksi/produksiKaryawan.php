<?= $this->extend('layouts/admin_pr') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Produksi Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_p">Home</a></li>
                        <li class="breadcrumb-item active">Data Produksi Karyawan</li>
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
                            <a href="#" class="btn btn-primary float-right">Kirim Data</a>
                            <h5>
                                Daftar Produksi Karyawan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>ID Karyawan</th>
                                            <th>Total Produksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produksi as  $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id_karyawan']; ?></td>
                                            <td><?php echo $row['total_produksi']; ?></td>
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