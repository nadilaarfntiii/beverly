<?= $this->extend('layouts/admin_pr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Produksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_p">Home</a></li>
                        <li class="breadcrumb-item active">Edit Produksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form action="<?php echo base_url('produksi/update/'.$produksi['kode_produksi']); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert"> Whoops! Ada kesalahan saat input data, yaitu:
                                    <ul>
                                        <?php foreach ($errors as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">Kode Produksi</label>
                                    <input type="text" class="form-control" name="kode_produksi" placeholder=""
                                        value="<?php echo $produksi['kode_produksi']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">ID Karyawan</label>
                                    <input type="text" class="form-control" name="id_karyawan" placeholder=""
                                        value="<?php echo $produksi['id_karyawan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Produksi</label>
                                    <input type="date" class="form-control" name="tanggal_produksi" placeholder=""
                                        value="<?php echo $produksi['tanggal_produksi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Id Barang</label>
                                    <input type="text" class="form-control" name="id_brg" placeholder=""
                                        value="<?php echo $produksi['id_brg']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Total Produksi</label>
                                    <input type="text" class="form-control" name="total_produksi" placeholder=""
                                        value="<?php echo $produksi['total_produksi']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('produksi'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>