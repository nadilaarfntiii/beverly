<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!-- /app/Views/pendapatan_create.php -->

<?= $this->extend('/layouts/admin_keu'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Tambah Pengeluaran Baru</h3>
                    </div>
                    <div class="card-body">
                        <form action="/pengeluaran/store" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_transaksi">ID Transaksi</label>
                                <input type="text" name="id_transaksi" id="id_transaksi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" name="nominal" id="nominal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nm_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="berkas">Bukti Transaksi</label>
                                <input type="file" name="berkas" id="berkas" class="form-control" required>
                            </div> 

                            <div class="form-group">
                                <label for="id_user">User</label>
                                <select name="id_user" id="id_user" class="form-control" required>
                                    <option value="">Pilih User</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_user']; ?>"><?= $u['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
