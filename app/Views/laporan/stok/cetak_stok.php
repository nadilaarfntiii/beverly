<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   , initial-scale=1.0">
    <title>Laporan Data Stok</title>
</head>
<body>

    <center>
        <h4>Laporan Data Stok<br>PT.BEVERLY INTERNATIONAL</h4>
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
            <th>Id barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tfoot>
        
    </tfoot>
    <tbody>
    <?php
        foreach ($stok as $s) :
    ?>
        <tr>
            <td>
                <?= $s['id_brg']; ?>
            </td>
            <td>
                <?= $s['nm_brg']; ?>
            </td>
            <td>
                <?= $s['satuan']; ?>
            </td>
            <td>
                <?= $s['harga']; ?>
            </td>
            <td>
                <?= $s['stok']; ?>
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