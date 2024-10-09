<?php
include "koneksi.php";
$sql = "CREATE TABLE datasiswa (
    nis CHAR(10) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(10) NOT NULL,
    telp VARCHAR(15),
    alamat VARCHAR(100),
    foto VARCHAR(100),
    PRIMARY KEY (nis)
)";
if (mysqli_query($connect, $sql)) {
    echo "Tabel berhasil dibuat";
} else {
    echo "Error: " . mysqli_error($connect);
}
mysqli_close($connect);
?>
