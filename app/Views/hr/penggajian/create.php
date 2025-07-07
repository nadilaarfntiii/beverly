<?= $this->extend('layouts/admin_hr') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data Gaji Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_h">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Gaji Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('penggajian/store'); ?>" method="post">
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
                                    <input type="text" class="form-control" name="kd_gaji" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Karyawan </label>
                                    <select name="id_karyawan" class="form-control"  placeholder="" id="id_karyawan"required>
                                    <option value="">Pilih Karyawan</option>
                                        <?php foreach ($karyawan as $k): ?>
                                            <option value="<?= $k['id_karyawan'] ?>"><?= $k['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" name="nm_krywn" placeholder="" id="validationCustom01"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Gaji Pokok</label>
                                    <input type="number" class="form-control" name="gaji" placeholder="" id="gaji"
                                        value="" required>
                                    <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Tunjangan</label>
                                    <input type="number" class="form-control" name="tunjangan" placeholder="" id="tunjangan"
                                        value="" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total" placeholder="" id="total"
                                        value="" readonly>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('penggajian'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gajiInput = document.getElementById('gaji');
        const tunjanganInput = document.getElementById('tunjangan');
        const totalInput = document.getElementById('total');

        function calculateTotal() {
            const gaji = parseFloat(gajiInput.value) || 0;
            const tunjangan = parseFloat(tunjanganInput.value) || 0;
            totalInput.value = gaji + tunjangan;
        }

        gajiInput.addEventListener('input', calculateTotal);
        tunjanganInput.addEventListener('input', calculateTotal);
    });
</script>
<?= $this->endSection() ?>