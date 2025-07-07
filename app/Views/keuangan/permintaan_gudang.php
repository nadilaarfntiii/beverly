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
                    <h1 class="m-0 text-dark">Approval Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Approval Pembelian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Approval Pembelian</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?= session()->getFlashdata('message'); ?>
                                <table class="table table-bordered table-hover table-auto">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ID PEMBELIAN</th>
                                            <th style="text-align: center;">TANGGAL</th>
                                            <th style="text-align: center;">PENGIRIM</th>
                                            <th style="text-align: center;">NAMA BARANG</th>
                                            <th style="text-align: center;">HARGA</th>
                                            <th style="text-align: center;">QTY</th>
                                            <th style="text-align: center;">TOTAL PEMBELIAN</th>
                                            <th style="text-align: center;">BERKAS</th>
                                            <th style="text-align: center;">STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $s) : 
                                    $actions = '';
                                    if ($s->status == 'Menunggu') {
                                        $status = "<span style='font-size:10;' class='label label-warning'> Menunggu </span>";
                                        $actions = "<a href='/unitgudang/disetujui/{$s->id_pemb}' class='btn btn-success btn-sm' 
                                        data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                    <a href='/unitgudang/ditolak/{$s->id_pemb}' class='btn btn-danger btn-sm' 
                                                    data-popup='tooltip' data-placement='top' title='Tidak Disetujui'><i class='fa fa-times' aria-hidden='true'></i></a>";
                                    } elseif ($s->status == 'Tidak Disetujui') {
                                        $status = "<span style='font-size:10;' class='label label-danger'> Tidak Disetujui </span>";
                                    } else {
                                        $status = "<span style='font-size:10;' class='label label-success'> Disetujui </span>";
                                    }
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $s->id_pemb; ?></td>
                                            <td style="text-align: center;"><?= $s->tgl_pemb; ?></td>
                                            <td style="text-align: center;"><?= $s->nama; ?></td>
                                            <td style="text-align: center;"><?= $s->nm_brg; ?></td>
                                            <td style="text-align: center;"><?= $s->harga; ?></td>
                                            <td style="text-align: center;"><?= $s->qty; ?></td>
                                            <td style="text-align: center;">Rp <?= number_format($s->qty * $s->harga, 0, ",", "."); ?></td>
                                            <td style="text-align: center;">
                                                <?php if (!empty($s->upload)) : ?>
                                                    <a href="<?= $s->nama_berkas; ?>" target="_blank"><?= $s->upload; ?></a>
                                                <?php else : ?>
                                                    Tidak ada berkas
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center;"><?= $status; ?></td>
                                            <td style="text-align: center;"><?= $actions; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
