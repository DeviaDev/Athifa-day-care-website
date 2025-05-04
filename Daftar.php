<?php 
include "connection.php";

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $message = "Formulir Pendaftaran berhasil dikirim!, silakan tunggu konfirmasi dari kami.";
        $status = "success";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AthifaDayCare.com</title>

    <link rel="icon" href="Images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Agbalumo&family=Hedvig+Letters+Serif:opsz@12..24&family=Libre+Baskerville:ital@1&family=Merriweather:ital,wght@0,300;1,300&family=Noto+Sans+Kawi&family=Playfair+Display&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Ubuntu+Condensed&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let status = "<?= $status ?>";
            let message = "<?= $message ?>";

            if (status === "success") {
                alert("✅ " + message);
            } else if (status === "error") {
                alert("❌ " + message);
            }
        });
    </script>


</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar">

        <div class="logo">
        <a href="#"><img src="Images/logo.png" alt="logo"></a>
        </div>
        <div class="navbar-nav">
                <a href="Beranda.php">Beranda</a>
                <a href="Tentang.php">Tentang</a>
                <a href="Program.php">Program</a>
                <a href="Daftar.php">Daftar</a>
                <a href="Hubungikami.php">Hubungi Kami</a>
                <a href="Login.php"><button class="my-button">Login</button></a>
        </div>
            
        </nav>
    <!-- Navbar end -->





   <!-- Biaya Start-->
    <div class="biaya">
        <h1>Biaya Program<span>Athifa DayCare</span></h1>
        <div class="table_biaya">

            <div class="paket">
                <h2>Paket Premium <p><span>(Paket Bulanan)</span></p></h2>
                <ul>
                    <li><img width="30px" src="Images/0.jpg"> Usia 0 Bulan - 12 Bulan <span>Rp. 2.250.000,-</span></li>
                    <li><img width="30px" src="Images/1.jpg"> Usia 24 Bulan - 48 Bulan <span>Rp. 2.550.000,-</span></li>
                </ul>
            </div>

            <div class="paket">
                <h2>Paket Reguler <p><span>(Paket Harian)</span></p></h2>
                <ul>
                    <li><img width="30px" src="Images/0.jpg"> Usia 0 Bulan - 12 Bulan <span>Rp. 75.000,-</span> </li>
                    <li><img width="30px" src="Images/1.jpg"> Usia 24 Bulan - 48 Bulan <span>Rp. 85.000,-</span> </li>
                </ul>
            </div>
            

        </div>

        

        <div class="barang">
            <h1>Perlengkapan<span> si kecil</span></h1>
            <div class="box_bawaan">
    
                <div class="bawaan">
                    <li>1. Baju Ganti min.3 pasang</li>
                    <li>2. Popok min.3 pasang</li>
                    <li>3. Perlengkapan mandi</li>
                    <li>4. Perlengkapan Baby</li>
                    <li>5. Kantong baju kotor</li>
                    <li>6. Botol susu dan susu formula/Asi</li>
                    <li>7. Obat-obatan/ Vitamin</li>
                    <p><span>Keterangan :</span> Ananda hadir dalam keadaan sehat, untuk prokes selalu gunakan masker pada saat pengantaran dan penjemputan dan hanya boleh sampai depan pintu masuk Athifa DayCare</p>
                </div>
                
                <div class="bawaan1">
                    <img src="Images/baru.png">
                </div>
    
            </div>
        </div>

    </div>
    <!-- Biaya End -->






    <!-- DAFTAR SEKARANG -->
     <div class="form_main">
     <div class="form">
        <h1>Form<span>Pendaftaran</span></h1>

        <div class="box_form">

            <div class="informasi">
                <form action="" method="POST">
                <h3>Informasi Anak</h3>

                <div class="input">
                    <p>Nama Lengkap <span>*</span></p>
                    <input type="text" name="nama_anak" placeholder="Nama Lengkap" required>
                </div>
    
                <div class="input">
                    <p>Tanggal Lahir <span>*</span></p>
                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                </div>

                <div class="input">
                <p>Pilih Jenis Kelamin <span>*</span></p>
                <select class="jenis" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>


                <br>
                <div class="input2">
                    <p>Foto Anak<span>*</span></p>
                    <input type="file" name="foto_anak" required>
                </div>

                <br>
                    <h3>Informasi Orang Tua</h3>
    
                    <div class="input">
                        <p>Nama Lengkap <span>*</span></p>
                        <input type="text" name="nama_wali"
                         placeholder="Nama Wali" required>
                    </div>
        
                    <div class="input">
                        <p>Nomor Telfon <span>*</span></p>
                        <input type="text" name="no_telepon" placeholder="Nomor Whatsapp" required>
                    </div>

                    <div class="input">
                        <p>Email <span>*</span></p>
                        <input type="text" name="email" required>
                    </div>

                    <div class="input">
                        <p>Alamat Lengkap <span>*</span></p>
                        <input type="text" name="alamat" required>
                    </div>

                    <div class="input">
                        <p>Kabupaten/Kota<span>*</span></p>
                        <input type="text" name="kab_kota" required>
                    </div>

                    <div class="input">
                        <p>Provinsi<span>*</span></p>
                        <input type="text" name="provinsi" required>
                    </div>

                    <div class="doc">
                    <div class="input2">
                        <p>Foto Kartu keluarga<span>*</span></p>
                        <input type="file" name="kartu_keluarga" required>
                    </div>

                    <div class="input2">
                        <p>Foto Ktp<span>*</span></p>
                        <input type="file" name="ktp" required>
                    </div>
                    </div>

                    </div>
            <button class="buttttt" type="submit">Submit</button>

        </div>
                    </form>

            
     </div>
    </div>
    <!-- DAFTAR SEKARANG -->




    <!-- FOOTER START -->
    <footer class="footer">
        <div class="footer-left">
    
            <div class="logo-left">
            <img height="200px" src="Images/fix.png" alt="Logo">
            </div>
    
            <div class="ket">
            <p>NPSN: 69984750</p>
            <p>Hari Kerja: Senin-Sabtu</p>
            <p>Jam Buka: 06.30 - 16.00 WIB</p>
            </div>
    
            <div>
            <p class="copyright">©Copyright-Athifa DayCare 2024</p>
            </div>
    
        </div>
    
    
        <div class="footer-center">
            <div>
            <i class="fa fa-map-marker"></i>
            <p>Jl. Kesambi Baru No 19 Kota Cirebon</p>
            </div>
    
            <div>
             <i class="fa fa-phone"></i>
             <p>089508597600</p>
            </div>
        
            <div>
            <i class="fa fa-envelope"></i>
            <p> <a href="#">athifadaycare@gmail.com</a></p>
            </div>
    
            <div>
                <a href="Daftar.php"><button class="join">Join Us</button></a>
            </div>
    
        </div>
    
        <div class="footer-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.338541371165!2d108.55564770000001!3d-6.728484699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d883168b673%3A0x19e54f6e9df7bb87!2sJl.%20Kesambi%20Baru%20No.19%2C%20Kesambi%2C%20Kec.%20Kesambi%2C%20Kota%20Cirebon%2C%20Jawa%20Barat%2045134!5e0!3m2!1sid!2sid!4v1732534590113!5m2!1sid!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"  referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="warna">
                <a href="https://www.instagram.com/athifadaycare/" class="fa fa-instagram">
                </a>
                
                <a href="https://www.facebook.com/athifa.athifa.5201254" class="fa fa-facebook">
                </a>
    
                <a href="http://127.0.0.1:5500/Beranda.html#" class="fa fa-globe">
                </a>
    
                <a href="https://www.youtube.com/@DevianestNarendra" class="fa fa-youtube">
                </a>
    
                <a href="https://t.me/devianestnarendra" class="fa fa-share">
                </a>
            </div>
    
        </div>
             
        </footer>
    <!-- FOOTER END -->


</body>

</html>
