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
                    <h1 class="m-0 text-dark">Approval Gaji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Approval Gaji</li>
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
                            <h6 class="m-0 font-weight-bold text-primary">Approval Gaji</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?= session()->getFlashdata('message'); ?>
                                <table class="table table-bordered table-hover table-auto">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">KODE</th>
                                            <th style="text-align: center;">ID GAJI</th>
                                            <th style="text-align: center;">TANGGAL</th>
                                            <th style="text-align: center;">PENGIRIM</th>
                                            <th style="text-align: center;">BERKAS</th>
                                            <th style="text-align: center;">STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $g) : 
                                            $actions = '';
                                            if ($g->status == 'Menunggu') {
                                                $status = "<span style='font-size:10;' class='label label-warning'> Menunggu </span>";
                                                $actions = "<a href='/unit_hr/disetujui/{$g->kode}' class='btn btn-success btn-sm' data-popup='tooltip' 
                                                data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                            <a href='/unit_hr/ditolak/{$g->kode}' class='btn btn-danger btn-sm' data-popup='tooltip' 
                                                            data-placement='top' title='Tidak Disetujui'><i class='fa fa-times' aria-hidden='true'></i></a>";
                                            } elseif ($g->status == 'Tidak Disetujui') {
                                                $status = "<span style='font-size:10;' class='label label-danger'> Tidak Disetujui </span>";
                                            } else {
                                                $status = "<span style='font-size:10;' class='label label-success'> Disetujui </span>";
                                            }
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $g->kode; ?></td>
                                                <td style="text-align: center;"><?= $g->kd_gaji; ?></td>
                                                <td style="text-align: center;"><?= $g->tgl_permintaan; ?></td>
                                                <td style="text-align: center;"><?= $g->nama; ?></td>
                                                <td style="text-align: center;">
                                                    <?php if (!empty($g->berkas)) : ?>
                                                        <a href="<?= $g->nama_berkas; ?>" target="_blank"><?= $g->berkas; ?></a>
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
