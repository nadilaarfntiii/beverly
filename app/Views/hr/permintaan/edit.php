<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Permintaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_h">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('permintaan/update/'.$permintaan['kode']); ?>" method="post" enctype="multipart/form-data">
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
                                    <label for="validationCustom01" class="form-label">Kode</label>
                                    <input type="text" class="form-control" name="kode" placeholder="" id="validationCustom01"
                                           value="<?php echo $permintaan['kode']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_permintaan" class="form-label">Tanggal Permintaan</label>
                                    <input type="date" class="form-control" name="tgl_permintaan" placeholder="" id="tgl_permintaan"
                                           value="<?php echo $permintaan['tgl_permintaan']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="berkas">Dokumen</label>
                                    <input type="file" name="berkas" id="berkas" class="form-control" value="<?php echo $permintaan['berkas']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" name="status" id="status" value="<?php echo $permintaan['status']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kd_gaji" class="form-label">ID Gaji</label>
                                    <select class="form-control" name="kd_gaji" id="kd_gaji" required>
                                        <option value="">Pilih ID Gaji</option>
                                        <?php foreach ($gaji as $row) : ?>
                                            <option value="<?= $row['kd_gaji']; ?>" <?= ($row['kd_gaji'] == $permintaan['kd_gaji']) ? 'selected' : ''; ?>>
                                                <?= $row['kd_gaji']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_user" class="form-label">Pengirim</label>
                                    <select class="form-control" name="id_user" id="id_user" required>
                                        <option value="">Pilih Pengirim</option>
                                        <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['id_user']; ?>" <?= ($u['id_user'] == $permintaan['id_user']) ? 'selected' : ''; ?>>
                                                <?= $u['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('permintaan'); ?>" class="btn btn-outline-info">Back</a>
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
