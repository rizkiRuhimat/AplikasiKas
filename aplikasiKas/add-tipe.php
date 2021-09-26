<?php
include_once 'config.php';
if (isset($_POST['save'])) {

    $kode_trx   =   $_POST['kodetrx'];
    $nama_trx   =   $_POST['nametrx'];
    $cat        =   $_POST['cat'];

    $sql = "INSERT INTO jenis_trx (id_trx , nama_trx,cat) VALUE ( '$kode_trx' , '$nama_trx','$cat' )";

    if (mysqli_query($conn, $sql)) {
        echo "record inserted successfully";

        header('Location: tipe-transaksi.php', 'refresh');
    } else {
        echo "ERROR : unable to execute $sql." . mysqli_error($conn);
    }
    mysqli_close($conn);
}