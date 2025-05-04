<?php 

include "connection.php";


function generateIdUser($conn) {
    $query = "SELECT MAX(id_user) AS max_id FROM pertanyaan_user";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $maxId = $row['max_id'];
    if ($maxId) {
        $urutan = (int) substr($maxId, 7);
        $urutan++;
    } else {
        $urutan = 1;
    }
    $idBaru = "pertanyaan_user" . str_pad($urutan, 2, "0", STR_PAD_LEFT);
    return $idBaru;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$nama_pertama = $_POST['nama_pertama'];
$nama_terakhir = $_POST['nama_terakhir'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$pertanyaan = $_POST['pertanyaan'];
$id_user = generateIdUser($conn);

    // Insert data ke tabel pelanggan
    $insertQuery = "INSERT INTO pertanyaan_user (id_user, nama_pertama, nama_terakhir, email, subject, pertanyaan) VALUES ('$id_user', '$nama_pertama', '$nama_terakhir', '$email', '$subject', '$pertanyaan')";
}


?>