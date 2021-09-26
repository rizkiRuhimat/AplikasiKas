<?php
include "config.php";


$sql = "SELECT * FROM imported_report ";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

if (isset($_POST['submit_file'])) {

    // validate to check uploaded file is a valid csv file
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');


            //fgetcsv($csv_file);
            // get data records from csv file
            while (($data = fgetcsv($csv_file, 1000, ";")) !== FALSE) {

                $data = preg_replace("/[^a-zA-Z0-9\s+]/", "", $data);

                // echo var_dump($data);
                // die;

                $sql_query = "SELECT * FROM imported_report WHERE no_id = '" . $data[0] . "'";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:" . mysqli_error($conn));

                //jika data dengan no_id sudah ada lakukan update
                //jika data dengan no_id belum ada lakukan insert
                if (mysqli_num_rows($resultset)) {
                    $sql_update = "UPDATE imported_report set name='" . $data[1] . "', spouse='" . $data[2] . "', kependudukan='" . $data[5] . "', status='" . $data[6] . "', kas='" . $data[7] . "', sampah='" . $data[8] . "', security='" . $data[9] . "' WHERE no_id = '" . $data[0] . "'";
                    mysqli_query($conn, $sql_update) or die("database error:" . mysqli_error($conn));
                } else {
                    $date_upload = date("Y-m-d H:i:s");
                    $mysql_insert = "INSERT INTO imported_report (`no_id`,`name`,`spouse`,`block`,`rNo`,`kependudukan`,`status`,`kas`,`sampah`,`security`,`date_upload` )VALUES('" . $data[0] . "','" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "', '" . $data[4] . "', '" . $data[5] . "', '" . $data[6] . "', '" . $data[7] . "', '" . $data[8] . "', '" . $data[9] . "', '" . $date_upload . "')";
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