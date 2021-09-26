<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'config.php';

    $sql = "SELECT DATE_FORMAT(a.`date`,'%M %Y') AS `date`, CONCAT('Dana Kas Sementara Sampai Dengan Bulan ',DATE_FORMAT(a.`date`,'%M %Y'))AS `info`,SUM(a.nominal) AS `total`
    FROM `buku_kas` AS a
    LEFT JOIN `data_nasabah` AS b ON a.`id_nasabah`=b.`id_nsbh`
    LEFT JOIN `jenis_trx` AS c ON a.`tipe`=c.id_trx
    WHERE 1=1 and a.cat = 'in' AND MONTH(`date`) = 01 ;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $total1 = $row['total'];
        $info1 = $row['info'];
    };
    $sql = "SELECT DATE_FORMAT(a.`date`,'%M %Y') AS `date`, CONCAT('Pengeluaran Dana Kas Sementara Sampai Dengan Bulan ',DATE_FORMAT(a.`date`,'%M %Y'))AS `info`,SUM(a.nominal) AS `total`
    FROM `buku_kas` AS a
    LEFT JOIN `data_nasabah` AS b ON a.`id_nasabah`=b.`id_nsbh`
    LEFT JOIN `jenis_trx` AS c ON a.`tipe`=c.id_trx
    WHERE 1=1 and a.cat = 'out' AND MONTH(`date`) = 01 ;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $total2 = $row['total'];
        $info2 = $row['info'];
    };
    $sisa = $total1 - $total2;
    ?>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3>Laporan Kas Kelas</h3>
                    <?php
                    $get    =   "SELECT * FROM `buku_kas` AS a
                    LEFT JOIN `data_nasabah` AS b ON a.`id_nasabah`=b.`id_nsbh`
                    LEFT JOIN `jenis_trx` AS c ON a.`tipe`=c.id_trx
                    WHERE 1=1 AND c.`cat` = 'in' AND MONTH(`date`) = '01';";
                    $result = $conn->query($get);
                    ?>
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No Nasabah</th>
                                <th>Kelas</th>
                                <th>Kode TRX</th>
                                <th>Nama Transaksi</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no             =   1;
                            while ($data = $result->fetch_assoc()) {
                                $tanggal        =   $data['date'];
                                $idnasabah      =   $data['id_nasabah'];
                                $kelas          =   $data['kelas'];
                                $kodetrx        =   $data['kode_trx'];
                                $namatrx        =   $data['nama_trx'];
                                $nominal        =   $data['nominal'];
                                $keterangan     =   $data['keterangan'];
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tanggal; ?></td>
                                <td><?= $idnasabah; ?></td>
                                <td><?= $kelas; ?></td>
                                <td><?= $kodetrx; ?></td>
                                <td><?= $namatrx; ?></td>
                                <td><?= $nominal; ?></td>
                                <td><?= $keterangan; ?></td>
                            </tr>
                            <?php
                            }; ?>
                        </tbody>
                    </table>
                    <input type="text" value="<?= $info1; ?>" style="width:30%; text-align:right"><input type="text"
                        value="<?= $total1; ?>" style="width:10%"><br>
                    <input type="text" value="<?= $info2; ?>" style="width:30%; text-align:right"><input type="text"
                        value="<?= $total2; ?>" style="width:10%"><br>
                    <input type="text" value="Sisa Kas Sementara " style="width:30%; text-align:right"><input
                        type="text" value="<?= $sisa; ?>" style="width:10%">
                </div>
            </div>
        </div>
    </div>
</body>

</html>