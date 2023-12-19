<?php
include "koneksi.php";
$No_Pasien = $_GET['No_Pasien'];
$sql = "DELETE FROM data_pasien where No_Pasien='$No_Pasien' ";
$perintah = mysqli_query($conn, $sql);

if($perintah){
    header("location:tampildata.php");
} else {
    echo "Data Gagal Terhapus";
}
?>