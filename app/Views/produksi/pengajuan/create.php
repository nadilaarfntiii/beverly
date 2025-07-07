<?= $this->extend('layouts/admin_pr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_p">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('pengajuan/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Whoops! Ada kesalahan saat input data, yaitu:
                                    <ul>
                                        <?php foreach ($errors as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control" name="id_brg" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Banyaknya</label>
                                    <input type="number" class="form-control" name="jumlah" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">*Noted : Pastikan data yang akan diajukan sesuai dengan permintaan yang dibutuhkan
                                        karena setelah terkirim data pengajuan tidak bisa diubah/dihapus.
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('pengajuan'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>