<?php
include "koneksi.php";
$No_Pasien = $_GET['No_Pasien'];
$sql = "SELECT * FROM data_pasien where No_Pasien='$No_Pasien' ";
$perintah = mysqli_query($conn,$sql);

$baris = mysqli_fetch_array($perintah);
$No_Pasien = $baris['No_Pasien'];
$Nama = $baris['Nama'];
$Alamat = $baris['Alamat'];
$Kota = $baris['Kota'];
$Tanggal_Lahir = $baris['Tanggal_Lahir'];
$Jenis_Kelamin = $baris['Jenis_Kelamin'];
$Status = $baris['Status'];
$foto = $baris['Foto'];

if($foto == null) {
    $foto = "images.jpg";
} else {
    $foto = $baris['Foto'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
<style>
      table {
        margin: auto;
        border-collapse: collapse;
    }

    td {
        padding: 5px;
    }

    input[type="text"],
    input[type="date"] {
        width: 200px;
        padding: 5px;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    input[type="submit"] {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    h1 {
        text-align: center;
    }
</style>
</head>
<body>
    <center>
    <h1>UPDATE DATA PASIEN</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>No_Pasien</td>
                <td><input type="number" name="No_Pasien" value="<?php echo $No_Pasien; ?>" readonly>
                
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $Nama; ?>">
                
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="Alamat" value="<?php echo $Alamat; ?>">
                
                </td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><input type="text" name="Kota" value="<?php echo $Kota; ?>">
                
                </td>
            </tr>
            <tr>
                <td>Tanggal_Lahir</td>
                <td><input type="date" name="Tanggal_Lahir" value="<?php echo $Tanggal_Lahir; ?>">
                
                </td>
            </tr>
            <tr>
                <td>Jenis_Kelamin</td>
                <td>
                    <input type="radio" name="Jenis_Kelamin" value="Laki-Laki" 
                    <?php echo $Jenis_Kelamin=='Laki-Laki'?"checked":""; ?>>Laki-Laki
                    <input type="radio" name="Jenis_Kelamin" value="Perempuan" 
                    <?php echo $Jenis_Kelamin=='Perempuan'?"checked":""; ?>>Perempuan
                
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="radio" name="Status" value="Menikah" 
                    <?php echo $Status=='Menikah'?"checked":""; ?>>Menikah
                    <input type="radio" name="Status" value="Belum Menikah" 
                    <?php echo $Status=='Belum Menikah'?"checked":""; ?>>Belum Menikah

                
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <img src="gambar/<?php echo $foto; ?>" width="100" height="100"> 
                    <br>
                    <input type="checkbox" name="ganti_foto" value="true"> Checklist Ubah Foto <br>
                    <input type="file" name="Foto">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="EDIT" >
                </td>
            </tr>    
        </table>
    </form>            
<?php
if(isset($_POST['submit'])){
    $No_Pasien = $_POST['No_Pasien'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $Kota = $_POST['Kota'];
    $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Status = $_POST['Status'];

    if(isset($_POST['ganti_foto'])) {
        $foto = $_FILES['Foto']['name'];
        $file_tmp = $_FILES['Foto']['tmp_name'];

        move_uploaded_file($file_tmp, 'gambar/'.$foto);
        $sql = "UPDATE data_pasien set Nama='$Nama', Alamat='$Alamat', Kota='$Kota', Tanggal_Lahir='$Tanggal_Lahir', Jenis_Kelamin='$Jenis_Kelamin', 
        Status='$Status', Foto='$foto' WHERE No_Pasien='$No_Pasien'";

        $perintah = mysqli_query($conn, $sql);
        if($perintah){
        header('location:tampildata.php');
        }
        else{
            echo"Data Gagal Terupdate";
        }
    } else {
        $sql = "UPDATE data_pasien set Nama='$Nama', Alamat='$Alamat', Kota='$Kota', Tanggal_Lahir='$Tanggal_Lahir', Jenis_Kelamin='$Jenis_Kelamin', 
        Status='$Status' WHERE No_Pasien='$No_Pasien'";
    
        $perintah = mysqli_query($conn, $sql);
        if($perintah){
            header('location:tampildata.php');
        }
        else{
            echo"Data Gagal Terupdate";
        }

    }
    
}
?>

</body>
</html>