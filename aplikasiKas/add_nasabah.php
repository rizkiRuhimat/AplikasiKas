<?php
include_once 'config.php';
if (isset($_POST['save'])) {

    $nama       = $_POST['nama'];
    $gender     = $_POST['gender'];
    $kelas      = $_POST['kelas'];
    $wali       = $_POST['wali'];
    $alamat     = $_POST['alamat'];
    $telp       = $_POST['telp'];
    $idnasabah  = date('Ymdhms');

    $sql = "INSERT INTO data_nasabah (id_nsbh , nama_murid , jenis_kelamin , kelas , nama_wali , alamat , telp) VALUE ( '$idnasabah' , '$nama' , '$gender' , '$kelas' , '$wali' , '$alamat' , '$telp' )";

    if (mysqli_query($conn, $sql)) {
        echo "record inserted successfully";

        header('Location: nasabah.php', 'refresh');
    } else {
        echo "ERROR : unable to execute $sql." . mysqli_error($conn);
    }
    mysqli_close($conn);
}