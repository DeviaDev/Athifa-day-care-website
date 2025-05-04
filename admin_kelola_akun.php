<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Profile - AthifaDaycare</title>

    <link rel="icon" href="Images/logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="dashboard.css">
    

  </head>

  <body style="height: 3000px;">


  
<!-- HEADER -->
<?php
include "admin_header.php";
?>
<!-- END HEADER -->




<!-- SIDEBAR -->
<?php
include "admin_sidebar.php";
?>
<!-- END SIDEBAR -->





<!-- CONTENT -->
        <div class="col-lg-9 mt-3">
        <div class="card">
  <div class="card-header">
    KELOLA AKUN
  </div>


  <div class="card-body">
  <?php 

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['peran']==""){
    header("location:Login.php?pesan=gagal");
}
?>
  <br>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">

                <div class="page-header clearfix mb-3">
                       
                       <a href="create_akun.php" class="btn btn-success pull-right">Tambah Akun Kontrol si Kecil</a>

                      
                   </div>
                  
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM login_akun");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                     <label for="">INFORMASI PESERTA DIDIK</label>
                      <tr>
                        <td>id_akun</td>
                        <td>username</td>
                        <td>password</td>
                        <td>peran</td>
                        <td>Action</td>
                      </tr>


                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>



                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row["id_akun"]?></td>
                        <td><?php echo $row["username"]?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["peran"]; ?></td>
        
                    <!-- UPDATE RECORD -->
                        <td><a href="update_akun.php?id_akun=<?php echo $row["id_akun"]; ?>" title='Update Record'><span><i class="bi bi-pencil"></i></span></a>

                    <!-- DELETE RECORD -->
                        <a href="delete_akun.php?id_akun=<?php echo $row["id_akun"]; ?>" title='Delete Record'><i class="bi bi-trash"></i></span></a>
                    
                    
                       
                        </td>
                    </tr>

    

                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

        <br>




  </div>
</div>
        </div>
<!-- END CONTENT -->

    </div>
    <div class="fixed-bottom text-center" style="background-color:rgb(255, 202, 104) height: 10%;" >
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>