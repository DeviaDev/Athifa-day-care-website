<?php
// Include database connection file
require_once "connection.php";

// Cek apakah ID telah diterima melalui GET
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Ambil data dari database berdasarkan ID
    $query = "SELECT * FROM pertanyaan_user WHERE id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan.");
}

// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];

    // Query untuk mengupdate data
    $updateQuery = "UPDATE pertanyaan_user SET status = ? WHERE id_user = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("si", $status, $id_user);

    if ($updateStmt->execute()) {
        // Redirect kembali ke admin_pertanyaan.php setelah berhasil
        header("Location: admin_pertanyaan.php");
        exit();
    } else {
        echo "Error: " . $updateStmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>
    <div class="container mt-5">
        <h2>Update Record</h2>
        <p>Please edit the input values and submit to update the record.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id_user=' . $id_user; ?>" method="post">
    <div class="form-group">
        <label for="status">Status Jawab</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Belum dijawab" <?php echo $row['status'] == 'Belum dijawab' ? 'selected' : ''; ?>>⚠️ Belum dijawab</option>
            <option value="Sudah dijawab" <?php echo $row['status'] == 'Sudah dijawab' ? 'selected' : ''; ?>>✅ Sudah dijawab</option>
            <option value="Spam" <?php echo $row['status'] == 'Spam' ? 'selected' : ''; ?>>❌ Spam</option>
        </select>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href="admin_pertanyaan.php" class="btn btn-secondary">Cancel</a>
</form>

    </div>
</body>
</html>
