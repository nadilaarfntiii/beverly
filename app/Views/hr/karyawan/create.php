<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('karyawan/store'); ?>" method="post" enctype="multipart/form-data">
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
                                    <label for="id" class="form-label">Id karyawan</label>
                                    <input type="text" class="form-control" name="id" placeholder="" id="id"
                                        value="<?=$id?>">
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jekel" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="" id="validationCustom02"
                                        value="" required>
                                    <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="berkas">Dokumen</label>
                                <input type="file" name="berkas" id="berkas" class="form-control" required>
                            </div> 
                                
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-outline-info">Back</a>
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