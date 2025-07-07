<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend('/layouts/admin_keu');?>
<?php $this->section('content');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Kategori </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard_k">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
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
                        <div class="card-header">
                            <a href="kategori/create" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Kategori</a>
                            <?php if (session()->getFlashdata('pesan')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID Kategori</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($kategori as $k) :
                                    ?>
                                        <tr class="text-center">
                                            <td>
                                                <?= $k['id_kategori']; ?>
                                            </td>
                                            <td>
                                                <?= $k['nm_kategori']; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <span style="margin-right: 5px;">
                                                        <a href="<?php echo base_url('kategori/ubah/' . $k['id_kategori']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="<?php echo base_url('kategori/delete/' . $k['id_kategori']); ?>" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </span>
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
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>