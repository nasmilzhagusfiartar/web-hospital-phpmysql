<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INPUT DATA DOKTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    form {
    width: 500px;
    margin: 0 auto;
    margin-top: 30px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
    border-radius: 25px;
}

    </style>
</head>
  <body>
    <h1 class="text-center mt-4">FORM DATA DOKTER</h1>

    <form method="post" action="" enctype="multipart/form-data">
<div class="mb-3">
  <label for="NIP" class="form-label">NIP : </label>
  <input type="text" class="form-control" id="NIP" placeholder="NIP" name="NIP" required>
</div>
    
<div class="mb-3">
  <label for="Nama" class="form-label">Nama : </label>
  <input type="text" class="form-control" id="Nama" placeholder="Masukkan Nama" name="Nama" required>
</div>
<label>Jenis Kelamin : </label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="Laki-Laki" value="Laki-Laki" required>
  <label class="form-check-label" for="Jenis_Kelamin" required>
    Laki-Laki
  </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="Perempuan"value="Perempuan" required>
    <label class="form-check-label" for="Jenis_Kelamin" required>
        Perempuan
  </label>
</div>
<br>

<label for="Spesialis">Spesialis : </label>
<select class="form-select" id="Spesialis" name="Spesialis" required>
  <option selected>Select Option</option>
  <option value="Kandungan">Kandungan</option>
  <option value="Kesehatan">Kesehatan</option>
  <option value="Psikolog">Psikolog</option>
  <option value="Gigi">Gigi</option>
  <option value="THT">THT</option>
</select>
<br>

<label for="Poli">Poli : </label>
<select class="form-select" id="Poli" name="Poli" required>
  <option selected>Select Option</option>
  <option value="Kandungan">Kandungan</option>
  <option value="Kesehatan">Kesehatan</option>
  <option value="Psikologi">Psikologi</option>
  <option value="Gigi">Gigi</option>
  <option value="THT">THT</option>
</select>
<br>

<label for="nama" class="form-label">Foto : </label>
  <input class="form-control" type="file" id="Foto" name="Foto"required>
<br>

  <center><input class="btn btn-primary" type="submit" name="submit" value="Submit"></center>
</form>

<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $nip = $_POST['NIP'];
    $nama = $_POST['Nama'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $spesialis = $_POST['Spesialis'];
    $poli = $_POST['Poli'];

    $images = $_FILES['Foto']['name'];
    $file_tmp = $_FILES['Foto']['tmp_name'];

    if(!empty($images)) {

        move_uploaded_file($file_tmp, 'images/'.$images);
        $sql = "INSERT INTO dokter VALUES('$nip', '$nama', '$jenis_kelamin', '$spesialis', '$poli', '$images')";
        
        $perintah = mysqli_query($conn, $sql);
        
        if ($perintah) {
            echo "<h3><Data Sukses Terinput</h3>";
            header("location:data_dokter.php");
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