<?php 
include "connection.php";

function generateIdUser($conn) {
    $query = "SELECT MAX(id_user) AS max_id FROM pertanyaan_user";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $maxId = $row['max_id'] ?? "pertanyaan_user00"; // Jika tidak ada data, mulai dari 00
    $urutan = (int) filter_var($maxId, FILTER_SANITIZE_NUMBER_INT);
    $urutan++;

    $idBaru = "pertanyaan_user" . str_pad($urutan, 2, "0", STR_PAD_LEFT);
    return $idBaru;
}

$message = ""; // Untuk menampilkan pesan notifikasi
$status = "";  // Status untuk menentukan alert JS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pertama = mysqli_real_escape_string($conn, $_POST['nama_pertama']);
    $nama_terakhir = mysqli_real_escape_string($conn, $_POST['nama_terakhir']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
    $id_user = generateIdUser($conn);

    // Query insert data
    $insertQuery = "INSERT INTO pertanyaan_user (id_user, nama_pertama, nama_terakhir, email, subject, pertanyaan) 
                    VALUES ('$id_user', '$nama_pertama', '$nama_terakhir', '$email', '$subject', '$pertanyaan')";

    if (mysqli_query($conn, $insertQuery)) {
        $message = "Pertanyaan berhasil dikirim!, silakan tunggu jawaban dari kami.";
        $status = "success";
    } else {
        $message = "Gagal mengirim pertanyaan: " . mysqli_error($conn);
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


     <div class="bg">
    <div class="hubungi">
        <div class="contact-info">
            <h2>Ajukan Pertanyaan</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="nama_pertama" placeholder="Nama Pertama" required>
                    <input type="text" name="nama_terakhir" placeholder="Nama Terakhir" required>
                </div>
                <div class="form-group2">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="pertanyaan" placeholder="Pertanyaan" rows="5" required></textarea>
                <button class="butttt" type="submit">Kirim</button>
                </div>
            </form>
        </div>
        <div class="hubungi-info">
            <h2>Ikuti Kami</h2>
            <p>
                Hubungi kami untuk informasi lebih lanjut dan survei</p>
            <p><strong>No. Telfon:</strong> (+62) 895 0859 7600 </p>
            <p><strong>emai:</strong> athifadaycare@gmail.com</p>
            <p><strong>Alamat:</strong> Athifa DayCare Jl. Kesambi Baru No 19 Kota Cirebon-Jawa Barat</p>
            <p><strong>Jam Buka:</strong> 6:30-14:00 Senin-Jum'at, Sabtu & Minggu Libur</p>

            <a href="https://api.whatsapp.com/send/?phone=%2B6285174176604&text&type=phone_number&app_absent=0"><button class="butttt" type="submit">WhatsApp</button></a>
        </div>
    </div>
</div>








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


















