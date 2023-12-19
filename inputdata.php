<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 0;
    background-color: #f4f4f4;
    background-position: center;
}

h1 {
    text-align: center;
    color: #333;
    padding: 20px 0;
}

form {
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}

</style>
<body>
    
    <h1>FORM DATA PASIEN</h1>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label for="nopasien">No Pasien : </label>
        <input type="text" id="nopasien" name="nopasien" required>

        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama" required>

        <label for="alamat">Alamat : </label>
        <input type="text" id="alamat" name="alamat" required>
 
        <label for="kota">Kota : </label>
        <input type="text" id="kota" name="kota" required>
 
        <label for="tanggal_lahir">Tanggal Lahir : </label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

        <label>Jenis Kelamin : </label>
        Laki-Laki<input type="radio" id="laki-laki" name="jk" value="Laki-Laki" required><br>
        Perempuan<input type="radio" id="perempuan" name="jk" value="Perempuan" required><br>
        
        <label>Status : </label>
        Menikah<input type="radio" id="menikah" name="status" value="Menikah" required></br>
        Belum Menikah<input type="radio" id="belum_menikah" name="status" value="Belum Menikah" required></br>
        <br>
        <label for="nama">Foto : </label>
        <input type="file" name="Foto" required>

        <center><input type="submit" name="submit" value="Submit"></center>
    </form>

<?php
include "koneksi.php";
    if (isset($_POST['submit'])) {
        $nopasien = $_POST['nopasien'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jk = $_POST['jk'];
        $status = $_POST['status'];

        $gambar = $_FILES['Foto']['name'];
        $file_tmp = $_FILES['Foto']['tmp_name'];

        if(!empty($gambar)) {

            move_uploaded_file($file_tmp, 'gambar/'.$gambar);
            $sql = "INSERT INTO data_pasien VALUES('$nopasien', '$nama', '$alamat', '$kota', '$tanggal_lahir', '$jk', '$status', '$gambar')";
            
            $perintah = mysqli_query($conn, $sql);
            
            if ($perintah) {
                // echo "<h3><Data Sukses Terinput</h3>";
                header("location:tampildata.php");
            } else{
                echo "<h3>Data Gagal Terinput</h3>";
            }
            
        } else{
            echo "<b>Belum Memilih Gambar</b>";
        }
    }




?>
</body>
</html>