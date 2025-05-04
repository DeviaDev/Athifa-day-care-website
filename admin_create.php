<?php
require_once "connection.php";

function generateIdPendaftar($conn) {
    $query = "SELECT MAX(id_pendaftar) AS max_id FROM profile_anak";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $maxId = $row['max_id'] ?? "profile_anak00"; // Jika tidak ada data, mulai dari 00
    $urutan = (int) filter_var($maxId, FILTER_SANITIZE_NUMBER_INT);
    $urutan++;

    $idBaru = "profile_anak" . str_pad($urutan, 2, "0", STR_PAD_LEFT);
    return $idBaru;
}

$message = ""; // Untuk menampilkan pesan notifikasi
$status = "";  // Status untuk menentukan alert JS

if(isset($_POST['save']))
{    
    $nama_anak = mysqli_real_escape_string($conn, $_POST['nama_anak']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $jenis_kelamin= mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $foto_anak = mysqli_real_escape_string($conn, $_POST['foto_anak']);
    $nama_wali = mysqli_real_escape_string($conn, $_POST['nama_wali']);
    $no_telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $kab_kota = mysqli_real_escape_string($conn, $_POST['kab_kota']);
    $provinsi = mysqli_real_escape_string($conn, $_POST['provinsi']);
    $kartu_keluarga = mysqli_real_escape_string($conn, $_POST['kartu_keluarga']);
    $ktp = mysqli_real_escape_string($conn, $_POST['ktp']);
    $id_pendaftar = generateIdPendaftar($conn);   

 // Query insert data
 $insertQuery = "INSERT INTO profile_anak (id_pendaftar, nama_anak, tanggal_lahir, jenis_kelamin, foto_anak, nama_wali, no_telepon, email, alamat, kab_kota, provinsi, kartu_keluarga, ktp) 
 VALUES ('$id_pendaftar', '$nama_anak', '$tanggal_lahir', '$jenis_kelamin', '$foto_anak', '$nama_wali', '$no_telepon', '$email', '$alamat', '$kab_kota', '$provinsi', '$kartu_keluarga', '$ktp')";



if (mysqli_query($conn, $insertQuery)) {
    header("location: admin_profile.php?x=admin_profile");
    exit();
} else {
    $message = "Gagal mengirim Formulir Pendaftaran: " . mysqli_error($conn);
    $status = "error";
}


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add menu record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    

    <h3>Informasi Anak</h3>

    <div class="form-group">
        <p>Nama Lengkap <span>*</span></p>
        <input type="text" name="nama_anak" class="form-control" value="" maxlength="50" required="">
    </div>

    <div class="form-group">
        <p>Tanggal Lahir <span>*</span></p>
        <input type="date" name="tanggal_lahir" class="form-control" value="" maxlength="50" required="">
    </div>

    <div class="form-group">
    <p>Pilih Jenis Kelamin <span>*</span></p>
    <select class="jenis" name="jenis_kelamin" class="form-control" value="" maxlength="50" required="" required>
        
        <option value="" disabled selected>Pilih </option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>


    <br>
    <div class="form-group">
        <p>Foto Anak<span>*</span></p>
        <input type="file" name="foto_anak" class="form-control" value="" maxlength="200" required="">
    </div>

    <br>
        <h3>Informasi Orang Tua</h3>

        <div class="form-group">
            <p>Nama Lengkap <span>*</span></p>
            <input type="text" name="nama_wali" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Nomor Telfon <span>*</span></p>
            <input type="text" name="no_telepon" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Email <span>*</span></p>
            <input type="email" name="email" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Alamat Lengkap <span>*</span></p>
            <input type="text" name="alamat" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Kabupaten/Kota<span>*</span></p>
            <input type="text" name="kab_kota" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Provinsi<span>*</span></p>
            <input type="text" name="provinsi" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="doc">
        <div class="form-group">
            <p>Foto Kartu keluarga<span>*</span></p>
            <input type="file" name="kartu_keluarga" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Foto Ktp<span>*</span></p>
            <input type="file" name="ktp" class="form-control" value="" maxlength="200" required="">
        </div>

        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit" >
                        <a href="admin_profile.php" class="btn btn-default">Cancel</a>
            </form>
            <br>
            <br>
    </div> 
    </div>
    </div>
               


</body>
</html>
