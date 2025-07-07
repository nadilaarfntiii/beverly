<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form action="<?php echo base_url('karyawan/update/'.$karyawan['id_karyawan']); ?>" method="post" enctype="multipart/form-data">
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
                                    <label for="">Id Karyawan</label>
                                    <input type="text" class="form-control" name="id_karyawan" placeholder=""
                                        value="<?php echo $karyawan['id_karyawan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder=""
                                        value="<?php echo $karyawan['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jekel" placeholder=""
                                        value="<?php echo $karyawan['jekel']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" placeholder=""
                                        value="<?php echo $karyawan['tgl_lahir']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder=""
                                        value="<?php echo $karyawan['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">No Hp</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder=""
                                        value="<?php echo $karyawan['no_hp']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="berkas">Dokumen</label>
                                <input type="file" name="berkas" id="berkas" class="form-control" 
                                value="<?php echo $karyawan['no_hp']; ?>"required>
                            </div> 

                            <div class="card-footer">
                                <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-outline-info">Back</a>
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