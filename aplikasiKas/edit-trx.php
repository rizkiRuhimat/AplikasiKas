<?php
// Include config file
require_once "config.php";
$id         = $_POST['id'];
$namatrx    = $_POST['nametrx'];

$sql    =   "update `jenis_trx` set `nama_trx` = '$namatrx' where `id` = '$id';";

$result = $conn->query($sql);
if ($result) {
    header("location:tipe-transaksi.php");
} else {
    echo mysqli_error();
}