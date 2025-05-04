<?php
require_once "connection.php";

function generateIdAkun($conn) {
    $query = "SELECT MAX(id_akun) AS max_id FROM login_akun";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $maxId = $row['max_id'] ?? "login_akun00"; // Jika tidak ada data, mulai dari 00
    $urutan = (int) filter_var($maxId, FILTER_SANITIZE_NUMBER_INT);
    $urutan++;

    $idBaru = "login_akun" . str_pad($urutan, 2, "0", STR_PAD_LEFT);
    return $idBaru;
}


if(isset($_POST['save']))
{    
    $username = $_POST['username'];
    $password= $_POST['password'];
    $peran = $_POST['peran'];
    $id_akun = generateIdAkun($conn); 
    

 // Query insert data
 $insertQuery = "INSERT INTO login_akun (id_akun, username, password, peran) 
 VALUES ('$id_akun', '$username', '$password', '$peran')";

if (mysqli_query($conn, $insertQuery)) {
    header("location: admin_kelola_akun.php?x=admin_kelola_akun");
    exit();
 } else {
    echo "Error: " . $insertQuery . " " . mysqli_error($conn);
 }
 mysqli_close($conn);

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
            

        <div class="form-group">
            <p>Username</p>
            <input type="text" name="username" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Password</p>
            <input type="text" name="password" class="form-control" value="" maxlength="200" required="">
        </div>

        <div class="form-group">
            <p>Peran</p>
            <input type="text" name="peran" class="form-control" value="" maxlength="200" required="">
        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit" >
                        <a href="admin_kelola_akun.php?x=admin_kelola_akun" class="btn btn-default">Cancel</a>
            </form>
            <br>
            <br>
    </div> 
    </div>
    </div>
               


</body>
</html>
