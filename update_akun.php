<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE login_akun SET  
                username = '" . $_POST['username'] . "',
                password = '" . $_POST['password'] . "', 
                peran = '" . $_POST['peran'] . "'
                WHERE id_akun= '" . $_POST['id_akun'] . "'");

     
     header("location: admin_kelola_akun.php?x=admin_kelola_akun");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM login_akun WHERE id_akun='" . $_GET['id_akun'] . "'");
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

                    <form method="POST" action="update_akun.php">

                   <br>
                    
    <div class="form-group">
    <label>Id_Akun</label>
    <input type="text" name="id_akun" class="form-control" value="<?php echo $row["id_akun"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $row["username"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Password</label>
    <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>" maxlength="100" required="">
    </div>

    <div class="form-group">
    <label>Peran</label>
    <input type="text" name="peran" class="form-control" value="<?php echo $row["peran"]; ?>" maxlength="100" required="">
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