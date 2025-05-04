<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE profile_anak SET  foto_anak = '" . $_POST['foto_anak'] . "',
                nama_anak = '" . $_POST['nama_anak'] . "',
                tanggal_lahir = '" . $_POST['tanggal_lahir'] . "',
                jenis_kelamin = '" . $_POST['jenis_kelamin'] . "', 
                nama_wali = '" . $_POST['nama_wali'] . "',
                no_telepon = '" . $_POST['no_telepon'] . "',
                email = '" . $_POST['email'] . "',
                alamat = '" . $_POST['alamat'] . "',
                kab_kota = '" . $_POST['kab_kota'] . "',
                provinsi = '" . $_POST['provinsi'] . "',
                kartu_keluarga = '" . $_POST['kartu_keluarga'] . "',
                ktp = '" . $_POST['ktp'] . "'
              WHERE id_pendaftar = '" . $_POST['id_pendaftar'] . "'");
     
     header("location: admin_profile.php?x=admin_profile");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM profile_anak WHERE id_pendaftar='" . $_GET['id_pendaftar'] . "'");
    $row= mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form method="POST" action="admin_update.php">

                   <br>
                    <h3>INFORMASI ANAK</h3>
                    

    <div class="form-group">
    <input type="hidden" name="id_pendaftar" value="<?php echo $row['id_pendaftar']; ?>" />
    </div>

    <div class="form-group">
    <label>Foto Anak</label>
    <input type="file" name="foto_anak" class="form-control" value="<?php echo $row["foto_anak"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Nama Anak</label>
    <input type="text" name="nama_anak" class="form-control" value="<?php echo $row["nama_anak"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row["tanggal_lahir"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" value="<?php echo $row["tanggal_lahir"]; ?>" maxlength="100" required="" >
        <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
        <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
    </select>
    </div>

    <br>
    <h3>INFORMASI ORANG TUA</h3>

    <div class="form-group">
    <label>Nama Wali</label>
    <input type="text" name="nama_wali" class="form-control" value="<?php echo $row["nama_wali"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" value="<?php echo $row["no_telepon"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?php echo $row["alamat"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Kab/Kota</label>
    <input type="text" name="kab_kota" class="form-control" value="<?php echo $row["kab_kota"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Provinsi</label>
    <input type="text" name="provinsi" class="form-control" value="<?php echo $row["provinsi"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Kartu Keluarga</label>
    <input type="file" name="kartu_keluarga" class="form-control" value="<?php echo $row["kartu_keluarga"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>KTP</label>
    <input type="file" name="ktp" class="form-control" value="<?php echo $row["ktp"]; ?>" maxlength="100" required="">
    </div>

    <button type="submit">Update</button>
    
</form>
<br>
<br>
                </div>
            </div>  
        </div>
</body>
</html>