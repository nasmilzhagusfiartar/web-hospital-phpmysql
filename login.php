<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' and password='$password' ";
$perintah = mysqli_query($conn, $sql);

$cek = mysqli_num_rows($perintah);

if ($cek>0) {
    $_SESSION['username'] = $username;
    header("location:dashboard.php");
} else {
    header("location:index.php?error=gagal");
}



?>