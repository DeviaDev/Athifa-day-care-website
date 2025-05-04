<?php
include_once 'connection.php';
$sql = "DELETE FROM login_akun WHERE id_akun='" . $_GET["id_akun"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: admin_kelola_akun.php?x=admin_kelola_akun");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>