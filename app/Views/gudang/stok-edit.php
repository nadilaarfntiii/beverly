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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Stok</h6>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo base_url('/stok/edit/' . $stok['id_brg']); ?>" method="post">
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
                                    <label for="validationCustom01" class="form-label">ID Barang</label>
                                    <input type="text" class="form-control" name="id_brg" placeholder="" id="validationCustom01"
                                        value="<?= $stok['id_brg'] ?>" required readonly>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nm_brg" placeholder="" id="validationCustom01"
                                        value="<?= $stok['nm_brg'] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" placeholder="" id="validationCustom01"
                                        value="<?= $stok['satuan'] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="" id="validationCustom01"
                                        value="<?= $stok['harga'] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" placeholder="" id="validationCustom01"
                                        value="<?= $stok['stok'] ?>" required>
                                        <div class="valid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('/stok'); ?>" class="btn btn-outline-info">Back</a>
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