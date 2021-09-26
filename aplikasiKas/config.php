<?php
$h = 'localhost';
$u = 'root';
$p = '';
$db = 'apl_kas';

$conn = mysqli_connect($h, $u, $p, $db);

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}