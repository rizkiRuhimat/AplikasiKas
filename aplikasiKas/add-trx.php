<?php
include_once 'config.php';
// var_dump($_POST['tipe']);
// die;
if (isset($_POST['save'])) {

    // $type       =   $_POST['tipe'];
    $no_trx      =   $_POST['no_trx'];
    $date       =   $_POST['date'];
    $idnsbh     =   $_POST['nama'];
    $nominal    =   $_POST['nominal'];
    $type       =   explode('-', $_POST['tipe']);
    $data       =   [
        'id_trx' =>  $type[0],
        'cat'   =>  $type[1]
    ];
    $tipetrx    =   $data['id_trx'];
    $cattrx     =   $data['cat'];

    // var_dump($tipetrx);
    // var_dump($data);
    // die;

    $sql    =   "INSERT INTO buku_kas (`date`,tipe,id_nasabah,kode_trx,cat,nominal) VALUE ('$date','$tipetrx','$idnsbh','$no_trx','$cattrx','$nominal' ); INSERT INTO kas_masuk (`date`,id_nsbh,kode_trx,nominal,tipe) VALUE ('$date','$idnsbh','$no_trx','$nominal','$tipetrx' )";
    if (mysqli_multi_query($conn, $sql)) {

        header('Location: transaksi.php', 'refresh');
    } else {
        echo "ERROR : unable to execute $sql." . mysqli_error($conn);
    }
    mysqli_close($conn);
}