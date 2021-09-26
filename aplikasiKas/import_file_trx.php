<?php
include "config.php";
$bln = $_POST['bln'];
$thn = $_POST['tahun'];

$sql = "SELECT * FROM imported_trx ";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$date_upload = date("Y-m-d H:i:s");

if (isset($_POST['submit_file'])) {

    // validate to check uploaded file is a valid csv file
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');


            //fgetcsv($csv_file);
            // get data records from csv file
            while (($data = fgetcsv($csv_file, 100, ";")) !== FALSE) {

                $sql_query = "SELECT * FROM imported_trx WHERE no_id = '" . $data[0] . "'";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:" . mysqli_error($conn));

                $search = "/T/";
                $flag = preg_match($search, $data[1]);

                if (mysqli_num_rows($resultset)) {

                    $sql_update = "UPDATE imported_trx set `kas`='" . $data[1] . "', sampah='" . $data[2] . "', flag='" . $flag . "' WHERE no_id = '" . $data[0] . "' and bulan = '" . $bln . "' and tahun = '" . $thn . "' ";

                    mysqli_query($conn, $sql_update) or die("database error:" . mysqli_errno($conn));
                } else {

                    $mysql_insert = "INSERT INTO imported_trx (no_id,bulan,tahun,kas,sampah,flag,`date`) VALUES ('" . $data[0] . "', '" . $bln . "', '" . $thn . "', '" . $data[1] . "', '" . $data[2] . "', '" . $flag . "','" . $date_upload . "')";

                    mysqli_query($conn, $mysql_insert) or die("database error:" . mysqli_error($conn));
                }
            }
            fclose($csv_file);
            $import_status = '?import_status=success';
        } else {
            $import_status = '?import_status=error';
        }
    } else {
        $import_status = '?import_status=invalid_file';
    }
}
header("Location: index.php" . $import_status);