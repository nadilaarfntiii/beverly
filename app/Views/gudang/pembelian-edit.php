<!DOCTYPE html>
<html lang="en">

<?= $this->include('gudang/head.php') ?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('gudang/aside.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('gudang/navbar.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Pengajuan Pembelian</h6>
                        </div>
                        <div class="card-body">

                    <form action="<?php echo base_url('/pembelian/edit/' . $pembelian['id_pemb']); ?>" method="post">
                                
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
                                    <label for="validationCustom01" class="form-label">ID Pembelian</label>
                                    <input type="text" class="form-control" name="id_pemb" placeholder="" id="validationCustom01"
                                        value="<?= $pembelian["id_pemb"] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Nama Barang</label>
                                    <select name="id_brg" id="" class="form-control">
                                        <option value="">Pilih Barang</option>
                                        <?php foreach ($barang as $item) : ?>
                                            <option <?= $pembelian['id_brg'] == $item['id_brg'] ? "selected" : "" ?> value="<?= $item['id_brg'] ?>"><?= $item["nm_brg"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">User</label>
                                    <select name="id_user" id="" class="form-control">
                                        <option value="">Pilih Barang</option>
                                        <?php foreach ($user as $item) : ?>
                                            <option <?= $pembelian['id_user'] == $item['id_user'] ? "selected" : "" ?> value="<?= $item['id_user'] ?>"><?= $item["nama"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="qty" placeholder="" id="validationCustom01"
                                        value="<?= $pembelian["qty"] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" class="form-control" name="tgl_pemb" placeholder="" id="validationCustom01"
                                        value="<?= $pembelian["tgl_pemb"] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Pilih file untuk diuanggah</label>
                                    <input type="file" class="form-control" name="upload" placeholder="" id="validationCustom01"
                                        value="<?= $pembelian["upload"] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="validationCustom01" required>
                                        <option value="Menunggu" <?= $pembelian["status"] == "Menunggu" ? "selected" : "" ?>>Menunggu</option>
                                        <option value="Disetujui" <?= $pembelian["status"] == "Disetujui" ? "selected" : "" ?>>Disetujui</option>
                                        <option value="Tidak Disetujui" <?= $pembelian["status"] == "Tidak Disetujui" ? "selected" : "" ?>>Tidak Disetujui</option>
                                        <!-- Tambahkan opsi-opsi status lainnya sesuai kebutuhan -->
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>
                                
                            </div>

                            <div class="card-footer">

                                <a href="<?php echo base_url('/pembelian'); ?>" class="btn btn-outline-info">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                            </div>

                        </div>
                    </form>
                           
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gudang cindy-0075 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    

    <?= $this->include('gudang/script.php') ?>

</body>

</html>