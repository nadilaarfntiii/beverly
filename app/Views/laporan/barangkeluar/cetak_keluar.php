<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   , initial-scale=1.0">
    <title>Laporan Barang Keluar</title>
</head>
<style> 
        table {
            border-collapse: collapse;
        }

        td, th {
            text-align: center;
            padding: 4px;
        }
    </style>
<body>

    <center>    
        <h4>Laporan Data Barang Keluar<br>PT.BEVERLY INTERNATIONAL</h4>
    </center>
    <hr>    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID Barang Keluar</th>
            <th>Nama Barang</th>
            <th>Stok Keluar</th>
            <th>Tanggal</th>
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
                <?= $s->id_brg_klr ?>
            </td>
            <td>
                <?= $s->nm_brg ?>
            </td>
            <td>
                <?= $s->jumlah ?>
            </td>
            <td>
                <?= $s->tgl_klr ?>
            </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
</body>
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
</html>