<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   , initial-scale=1.0">
    <title>Laporan Data Pembelian</title>
</head>
<body>

    <center>
        <h4>Laporan Data Pembelian<br>PT.BEVERLY INTERNATIONAL</h4>
    </center>

    <hr>    

    <style> 
        table {
            border-collapse: collapse;
        }

        td, th {
            text-align: center;
            padding: 4px;
        }
    </style>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
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

<script>    
    print();

    setTimeout(() => {
        history.back();
    }, 2000);
</script>
<br>
<h4>Tertanda Kepala Gudang
 <br>
 <br>
 <br>
 <br>
 <br>
 (...........................................)</h4>
</body>
</html>