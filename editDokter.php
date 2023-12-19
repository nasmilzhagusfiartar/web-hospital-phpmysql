<?php
include "koneksi.php";
$NIP = $_GET['NIP'];
$sql = "SELECT * FROM dokter where NIP='$NIP' ";
$perintah = mysqli_query($conn,$sql);

$baris = mysqli_fetch_array($perintah);
$NIP = $baris['NIP'];
$Nama = $baris['Nama'];
$Jenis_Kelamin = $baris['Jenis_Kelamin'];
$Spesialis = $baris['Spesialis'];
$Poli = $baris['Poli'];
$Foto = $baris['Foto'];

if($Foto == null) {
    $Foto = "profil.jpg";
} else {
    $Foto = $baris['Foto'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT FORM</title>
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
    <h1 class="text-center mt-4">UPDATE DATA DOKTER</h1>

    <form method="post" action="" enctype="multipart/form-data">
<div class="mb-3">
  <label for="NIP" class="form-label">NIP : </label>
  <input type="text" class="form-control" id="NIP" placeholder="NIP" name="NIP" value="<?php echo $NIP; ?>" readonly>
</div>
    
<div class="mb-3">
  <label for="Nama" class="form-label">Nama : </label>
  <input type="text" class="form-control" id="Nama" placeholder="Masukkan Nama" name="Nama" value="<?php echo $Nama; ?>">
</div>
<label>Jenis Kelamin : </label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="Laki-Laki" value="Laki-Laki" 
    <?php echo $Jenis_Kelamin=='Laki-Laki'?"checked":""; ?>>
  <label class="form-check-label" for="Jenis_Kelamin">
    Laki-Laki
  </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="Perempuan" value="Perempuan" 
    <?php echo $Jenis_Kelamin=='Perempuan'?"checked":""; ?>>
    <label class="form-check-label" for="Jenis_Kelamin">
        Perempuan
  </label>
</div>
<br>

<label for="Spesialis">Spesialis : </label>
<select class="form-select" id="Spesialis" name="Spesialis" value="
<?php echo $Spesialis; ?>">
  <option selected>Select Option</option>
  <option value="Kandungan">Kandungan</option>
  <option value="Kesehatan">Kesehatan</option>
  <option value="Psikolog">Psikolog</option>
  <option value="Gigi">Gigi</option>
  <option value="THT">THT</option>
</select>
<br>

<label for="Poli">Poli : </label>
<select class="form-select" id="Poli" name="Poli" value="<?php echo $Poli; ?>">
  <option selected>Select Option</option>
  <option value="Kandungan">Kandungan</option>
  <option value="Kesehatan">Kesehatan</option>
  <option value="Psikologi">Psikologi</option>
  <option value="Gigi">Gigi</option>
  <option value="THT">THT</option>
</select>
<br>

<label for="nama" class="form-label">Foto : </label>
<img src="images/<?php echo $Foto; ?>" width="100" height="100"><br>
  <input class="form-control" type="file" id="Foto" name="Foto">
<br>

  <center><input class="btn btn-primary" type="submit" name="submit" value="Submit"></center>
</form>

<?php
if(isset($_POST['submit'])){
    $NIP = $_POST['NIP'];
    $Nama = $_POST['Nama'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Spesialis = $_POST['Spesialis'];
    $Poli = $_POST['Poli'];

    if(isset($_POST['ganti_foto'])) {
        $Foto = $_FILES['Foto']['name'];
        $file_tmp = $_FILES['Foto']['tmp_name'];

        move_uploaded_file($file_tmp, 'images/'.$Foto);
        $sql = "UPDATE dokter set Nama='$Nama', Jenis_Kelamin='$Jenis_Kelamin', Spesialis='$Spesialis', Poli='$Poli', 
        Foto='$Foto' WHERE NIP='$NIP'";

        $perintah = mysqli_query($conn, $sql);
        if($perintah){
        header('location:data_dokter.php');
        }
        else{
            echo"Data Gagal Terupdate";
        }
    } else {
        $sql = "UPDATE dokter set Nama='$Nama', Jenis_Kelamin='$Jenis_Kelamin', Spesialis='$Spesialis', Poli='$Poli', 
        Foto='$Foto' WHERE NIP='$NIP'";

        $perintah = mysqli_query($conn, $sql);
        if($perintah){
            header('location:data_dokter.php');
        }
        else{
            echo"Data Gagal Terupdate";
        }

    }
    
}
?>
  </body>
</html>