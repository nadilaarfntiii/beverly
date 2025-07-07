<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body onload="window.print()">
    <center>
        <table style="width: 100%; border-collapse: collapse; text-align: center;" border="0">
            <tr>
                <td>
                    <table style="width: 100%; text-align: center;" border="0">
                        <tr style="text-align: center;">
                            <td>
                                <h3>Laporan Kehadiran Karyawan <br> PT Beverly Internationalr</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <table border="1"
                                        style="width: 90%; border-collapse: collapse; border: 1px solid #000;">
                                        <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            
                                            
                                    </thead>
                                        <tbody>
                                            <?php foreach ($kehadiran as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['kd_absen']; ?></td>
                                                <td><?php echo $row['tanggal']; ?></td>
                                                <td><?php echo $row['nm_krywn']; ?></td>
                                                <td><?php echo $row['jam_masuk']; ?></td>
                                                <td><?php echo $row['jam_pulang']; ?></td>
                                               
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td style="height: 20px;"></td>
                                                <td style="height: 20px;"></td>
                                                <td style="height: 20px;"></td>
                                                <td style="height: 20px;"></td>
                                                <td style="height: 20px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>