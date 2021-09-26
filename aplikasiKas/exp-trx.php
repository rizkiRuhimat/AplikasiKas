<?php
include_once 'config.php';
// var_dump($_POST['tipe']);
// die;
if (isset($_POST['save'])) {

    // $type       =   $_POST['tipe'];
    $no_trx      =   $_POST['no_trx'];
    $date       =   $_POST['date'];
    $nominal    =   $_POST['nominal'];
    $ket        =   $_POST['ket'];
    $type       =   explode('-', $_POST['tipe']);
    $data       =   [
        'idtrx' =>  $type[0],
        'cat'   =>  $type[1]
    ];
    $tipetrx    =   $data['idtrx'];
    $cattrx     =   $data['cat'];

    // var_dump($data);
    // die;
    $sql    =   "INSERT INTO buku_kas (`date`,tipe,kode_trx,cat,nominal,keterangan) VALUE ('$date','$tipetrx','$no_trx','$cattrx','$nominal','$ket'); INSERT INTO kas_keluar (`date`,`kode_trx`,`nominal`,`keterangan`,`tipe`) VALUE ('$date','$no_trx','$nominal','$ket','$tipetrx')";
    if (mysqli_multi_query($conn, $sql)) {
        header('Location: transaksi.php', 'refresh');
    } else {
        echo "ERROR : unable to execute $sql." . mysqli_error($conn);
    }
    mysqli_close($conn);
}