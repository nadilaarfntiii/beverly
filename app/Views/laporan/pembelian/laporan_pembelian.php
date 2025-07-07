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
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Pembelian</h6>
                        </div>
                        <div class="card-body">

                            <?php 
                            function getListBulan()
                            {
                              return [
                                "01" => "Januari",
                                "02" => "Februari",
                                "03" => "Maret",
                                "04" => "April",
                                "05" => "Mei",
                                "06" => "Juni",
                                "07" => "July",
                                "08" => "Agustus",
                                "09" => "September",
                                "10" => "Oktober",
                                "11" => "November",
                                "12" => "Desember",
                              ];
                            }
                            $blnNow = date("m");
                            $allBulan = getListBulan();
                            $thnNow = date("Y");
                             ?>
                            <form action="/laporan/pembelian/cetak" method="GET">
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bln" class="form-control">
                            <?php foreach ($allBulan as $bulan => $namaBulan): ?>
                                <option value="<?= $bulan ?>" <?= $bulan == $blnNow ? "selected" : "" ?>><?= $namaBulan ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="thn" class="form-control">
                            <?php for($i = 2024; $i < (((int) $thnNow) + 4); $i++ ) :  ?>
                                <option value="<?= $i ?>" <?= $i == $thnNow ? "selected" : "" ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>

                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="" style="opacity: 0;">Cetak</label>
                        <br>
                        <button class="btn btn-success mb-3">Cetak</button>
                    </div>
                    </div>
                </div>

                                
                            </form>

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
                    <a class="btn btn-primary" href="/logout_ac">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('gudang/script.php') ?>

</body>

</html>