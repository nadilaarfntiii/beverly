<?= $this->extend('layouts/admin_pr') ?>
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
                        <li class="breadcrumb-item"><a href="/dashboard_p">Home</a></li>
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
                                <form action="/laporan/cetak_pengajuan" class="d-inline" target="_blank" method="post">   
                                    <button type="submit" class="btn btn-primary float-right">Cetak Laporan</button>
                                </form>
                            </h5>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pengajuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pengajuan as  $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id_brg']; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo $row['jumlah']; ?> Ton</td>
                                            <td><?php echo $row['tanggal_pengajuan']; ?></td>
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