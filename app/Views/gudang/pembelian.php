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
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
                        </div>
                        <div class="card-body">

                            <a href="/pembelian/create" class="btn btn-primary mb-3">Tambah Pengajuan</a>

                            <?php if (session()->getFlashdata('pesan')): ?>
                                <div class="alert alert-success mb-4" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pembelian</th>
                                            <th>User</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Berkas</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        foreach ($data as $s) :
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $s->id_pemb; ?>
                                            </td>
                                            <td>
                                                <?= $s->nama; ?>
                                            </td>
                                             <td>
                                                <?= $s->nm_brg; ?>
                                            </td>
                                            <td>
                                                <?= $s->satuan; ?>
                                            </td>
                                            <td>
                                                <?= $s->harga; ?>
                                            </td>
                                            <td>
                                                <?= $s->qty; ?>
                                            </td>
                                            <td>
                                                <?= $s->tgl_pemb; ?>
                                            </td>
                                            <td>
                                                <?= $s->upload; ?>
                                            </td>
                                            <td>
                                                <?= $s->status; ?>
                                            </td>
                                            <td>
                                                Rp <?= number_format($s->qty * $s->harga, 0, ",", ".") ?>
                                            </td>
                                            
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('/pembelian/edit/' . $s->id_pemb); ?>"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <br>
                                                    <a href="<?php echo base_url('/pembelian/delete/' . $s->id_pemb); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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