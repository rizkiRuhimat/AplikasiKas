<?php
include_once 'config.php';
if (isset($_POST['save'])) {

    $no_id       = $_POST['idwarga'];
    $nama       = $_POST['name'];
    $spouse     = $_POST['pasangan'];
    $blok      = $_POST['blok'];
    $no_rumah       = $_POST['no'];
    $kependudukan     = $_POST['kependudukan'];
    $status       = $_POST['status'];
    $iurankas       = $_POST['kas'];
    $iuransampah       = $_POST['sampah'];
    $iuransecurity       = $_POST['security'];
    $date_upload = date("Y-m-d H:i:s");
    $idnasabah  = date('Ymdhms');

    $sql = "INSERT INTO data_warga (`no_id`,`name`,`spouse`,`block`,`rNo`,`kependudukan`,`status`,`kas`,`sampah`,`security`,`date_upload`) VALUE ( '$no_id' , '$name' , '$spouse' , '$blok' , '$no_rumah' , '$kependudukan' , '$status' , '$kas' , '$sampah' , '$security' ,'$date_upload')";

    if (mysqli_query($conn, $sql)) {
        echo "record inserted successfully";

        header('Location: nasabah.php', 'refresh');
    } else {
        echo "ERROR : unable to execute $sql." . mysqli_error($conn);
    }
    mysqli_close($conn);
}