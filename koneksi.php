<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_siswa";
$connect = mysqli_connect($host, $username, $password, $database);
if (!$connect) {
    die("Koneksi dengan database gagal: " . mysqli_connect_error());
}
?>
