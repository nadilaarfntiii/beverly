<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend('/layouts/admin_keu'); ?>
<?php $this->section('content'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Tambah Kategori Baru</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk menambah data kategori -->
                        <form action="<?= base_url('kategori/store'); ?>" method="post">
                            <div class="form-group">
                                <label for="id_kategori">ID Kategori</label>
                                <input type="text" class="form-control" id="id_kategori" name="id_kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="nm_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" required>
                            </div>
                            <!-- Tombol untuk menyimpan data -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
