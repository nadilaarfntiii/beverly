<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            width: 90%;
            margin: 50px auto;
            text-align: right;
            position: relative;
        }
        .signature p {
            margin: 0;
        }
        .signature .name {
            margin-top: 65px; 
            font-weight: bold;
            position: absolute;
            right: 0%;
            transform: translateX(-29%);
        }
    </style>
</head>

<body onload="window.print()">
    <center>
        <h3>Laporan Pendapatan PT. Beverly International</h3>
        Bulan <?= format_bulan($bulan); ?>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; $total_nominal = 0; ?>
                <?php foreach ($laporanPendapatan as $pend): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $pend['id_transaksi']; ?></td>
                    <td><?= $pend['tanggal']; ?></td>
                    <td><?= $pend['keterangan']; ?></td>
                    <td>Rp<?= number_format($pend['nominal'], 0, ',', '.'); ?></td>
                </tr>
                <?php $total_nominal += $pend['nominal']; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th>Rp<?= number_format($total_nominal, 0, ',', '.'); ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="signature">
            <p>Kepala Bagian Keuangan</p>
            <p class="name"><?= session()->get('nama'); ?></p>
        </div>
    </center>
</body>

</html>
