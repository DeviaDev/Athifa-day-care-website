<?php
include_once 'connection.php';
$sql = "DELETE FROM profile_anak WHERE id_pendaftar='" . $_GET["id_pendaftar"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: admin_profile.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>