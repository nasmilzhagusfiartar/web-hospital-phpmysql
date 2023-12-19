<?php
include "koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location:dashboard.php");
}



$sql = "SELECT * FROM data_pasien";
$perintah = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tampil Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
body {
    font-family: Arial, sans-serif;
}

h1 {
    color: #333;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

.container-logout {
    margin-bottom: 50px;
    padding-top: 50px;
    padding-right: 50px;
    text-align: right;
    background: #fff;
    box-shadow: 2px 3px 5px;
    border-radius: 5px;
}

h2 {
    margin: 10px;
}
</style>
</head>
<body>
    <center>

    <!-- Navbar Section Start -->
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="dashboard.php">Nasmilzha Hospital</a>

<span class="text-white-50 ms-3 w-100 fs-6 py-1">Admin</span>
<div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <a href="<?= $main_url ?>dashboard.php" class="nav-link px-5">Logout</a>
    </div>
</div>
</header>
<!-- Navbar Section End -->


    <h1>Data Pasien Nasmilzha Hospital</h1>
    <a href="<?= $main_url ?>inputdata.php" class="btn btn btn-primary btn-lg mb-3"><i class="bi bi-plus-lg">Data Baru</i></a>
    <form action="" method="post">
    <?php
    $cari = '';
    if(isset($_POST['cari'])) {
        $cari = $_POST['cari'];
    }
    ?>
        <input type="text" name="cari" value="<?php echo $cari; ?>">
        <input type="submit" name="submit" value="Pencarian">
    <table>
        <tr>
            <th>No Pasien</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        
        if(isset($_POST['cari'])) {
            $cari = trim($_POST['cari']);
            $sql = "SELECT * FROM data_pasien where No_Pasien like '%$cari%' or Nama like '%$cari%' or Alamat like '%$cari%' or 
            Kota like '%$cari%' or Jenis_Kelamin like '%$cari%' ";
        }else {
            $sql = "SELECT * FROM data_pasien";
        }

        $perintah = mysqli_query($conn, $sql);
       
        while ($baris = mysqli_fetch_array($perintah)) {
          if ($baris['Foto']==null) {
            $Foto='images.jpg';
          } else {
            $Foto=$baris['Foto'];
          }
            echo "<tr>
            <td>$baris[No_Pasien]</td>
            <td>$baris[Nama]</td>
            <td>$baris[Alamat]</td>
            <td>$baris[Kota]</td>
            <td>$baris[Tanggal_Lahir]</td>
            <td>$baris[Jenis_Kelamin]</td>
            <td>$baris[Status]</td>
            <td><img src='gambar/$Foto' width='100px' height='100px'></td>
            <td>
            <a href=editForm.php?No_Pasien=$baris[No_Pasien]>Edit</a> |
            <a href=hapus.php?No_Pasien=$baris[No_Pasien] onclick=\"return confirm('Apakah Anda yakin untuk menghapus?')\">Hapus</a> 
            </td>
            </tr>";
        }
        
        ?>
</body>
</html>