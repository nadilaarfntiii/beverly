<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend('/layouts/admin_keu'); ?>
<?php $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Form Ubah Pendapatan </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Form untuk mengubah data pendapatan -->
                            <form action="/pendapatan/update/<?= $pendapatan['id_transaksi']; ?>" method="post" enctype="multipart/form-data">
                                <!-- Isi form sesuai dengan kolom yang ingin diubah -->
                                <div class="form-group">
                                    <label for="id_transaksi">ID Transaksi</label>
                                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $pendapatan['id_transaksi']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pendapatan['tanggal']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $pendapatan['keterangan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $pendapatan['nominal']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="id_kategori">Kategori</label>
                                    <select class="form-control" id="id_kategori" name="id_kategori">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?= $kat['id_kategori']; ?>" <?= ($kat['id_kategori'] == $pendapatan['id_kategori']) ? 'selected' : ''; ?>>
                                                <?= $kat['nm_kategori']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="berkas">Bukti Transaksi</label>
                                    <input type="file" class="form-control" id="berkas" name="berkas" value="<?= $pendapatan['berkas']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="id_user">User</label>
                                    <!-- Menggunakan select option untuk user -->
                                    <select class="form-control" id="id_user" name="id_user" disabled>
                                        <!-- Ganti opsi user sesuai dengan data dari database -->
                                        <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['id_user']; ?>" <?= ($u['id_user'] == $pendapatan['id_user']) ? 'selected' : ''; ?>>
                                                <?= $u['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Tombol untuk mengirimkan data -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
