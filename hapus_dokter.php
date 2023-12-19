<?php
include "koneksi.php";
$NIP = $_GET['NIP'];
$sql = "DELETE FROM dokter where NIP='$NIP' ";
$perintah = mysqli_query($conn, $sql);

if($perintah){
    header("location:data_dokter.php");
} else {
    echo "Data Gagal Terhapus";
}
?>