<?php
// Include config file
require_once "config.php";
$id         = $_GET['id'];

$sql    =   "delete from `jenis_trx` where `id` = '$id';";

$result = $conn->query($sql);
if ($result) {
    header("location:tipe-transaksi.php");
} else {
    "Data Failed to Update";
}