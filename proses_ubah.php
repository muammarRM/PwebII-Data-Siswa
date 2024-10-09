<?php
include "koneksi.php";
$nis = $_GET['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

if(isset($_POST['ubah_foto'])){ // Hanya lakukan proses ini jika checkbox 'ubah_foto' dicentang
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    
    // Rename file baru
    $fotobaru = date('dmYHis').$foto;
    $path = "images/".$fotobaru;
    
    // Proses upload
    if(move_uploaded_file($tmp, $path)){
        // Hapus foto lama dari folder
        $query = "SELECT * FROM datasiswa WHERE nis='$nis'";
        $sql = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($sql);
        
        $oldPath = "images/".$data['foto'];
        if(is_file($oldPath)){
            unlink($oldPath);
        }
        
        // Update data ke database
        $query = "UPDATE datasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', telp='$telp', alamat='$alamat', foto='$fotobaru' WHERE nis='$nis'";
        if(mysqli_query($connect, $query)){
            header("location: index.php");
        } else {
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_ubah.php?nis=$nis'>Kembali Ke Form</a>";
        }
    } else {
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form_ubah.php?nis=$nis'>Kembali Ke Form</a>";
    }
} else {
    // Update data tanpa mengubah foto
    $query = "UPDATE datasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', telp='$telp', alamat='$alamat' WHERE nis='$nis'";
    if(mysqli_query($connect, $query)){
        header("location: index.php");
    } else {
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah.php?nis=$nis'>Kembali Ke Form</a>";
    }
}
?>
