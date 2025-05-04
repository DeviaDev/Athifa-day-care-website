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
    PROFILE ANAK
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
                       
                       <a href="admin_create.php" class="btn btn-success pull-right">Tambah Peserta Didik</a>

                      
                   </div>
                  
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM profile_anak");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                     <label for="">INFORMASI PESERTA DIDIK</label>
                      <tr>
                        <td>id_pendaftar</td>
                        <td>Foto Anak</td>
                        <td>Nama Anak</td>
                        <td>Tanggal Lahir</td>
                        <td>Jenis Kelamin</td>
                        <td>Action</td>
                      </tr>


                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>



                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row["id_pendaftar"]?></td>
                        <td><?php echo $row["foto_anak"]?></td>
                        <td><?php echo $row["nama_anak"]; ?></td>

                        <td><?php echo $row["tanggal_lahir"]; ?></td>
                        <td><?php echo $row["jenis_kelamin"]?></td>
        
                    <!-- UPDATE RECORD -->
                        <td><a href="admin_update.php?id_pendaftar=<?php echo $row["id_pendaftar"]; ?>" title='Update Record'><span><i class="bi bi-pencil"></i></span></a>

                    <!-- DELETE RECORD -->
                        <a href="admin_delete.php?id_pendaftar=<?php echo $row["id_pendaftar"]; ?>" title='Delete Record'><i class="bi bi-trash"></i></span></a>
                    
                    
                       
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

        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
          

                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM profile_anak");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-3'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->


                      <label for="">INFORMASI ORANG TUA</label>
                      <tr>
                        <td>id_pendaftar</td>
                        <td>Nama Wali</td>
                        <td>No Telepon</td>
                        <td>Email</td>
                        <td>Alamat</td>
                        <td>Kab_Kota</td>
                        <td>Provinsi</td>
                        <td>Kartu Keluarga</td>
                        <td>KTP</td>
                        <td>Action</td>
                      </tr>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>


                    <tr>
                      <td><?php echo $row["id_pendaftar"]?></td>
                        <td><?php echo $row["nama_wali"]?></td>
                        <td><?php echo $row["no_telepon"]?></td>
                        <td><?php echo $row["email"]; ?></td>

                        <td><?php echo $row["alamat"]; ?></td>
                        <td><?php echo $row["kab_kota"]?></td>
                        <td><?php echo $row["provinsi"]?></td>
                        <td><?php echo $row["kartu_keluarga"]?></td>
                        <td><?php echo $row["ktp"]?></td>
                       
                    <!-- UPDATE UPDATE -->
                        <td><a href="admin_update.php?id_pendaftar=<?php echo $row["id_pendaftar"]; ?>" title='Update Record'><span><i class="bi bi-pencil"></i></span></a>

                    
                    <!-- DELETE RECORD -->
                    <a href="admin_delete.php?id_pendaftar=<?php echo $row["id_pendaftar"]; ?>" title='Delete Record'><i class="bi bi-trash"></i></span></a>
    
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