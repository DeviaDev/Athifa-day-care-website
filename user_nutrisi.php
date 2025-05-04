<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nutrisi - AthifaDaycare</title>

    <link rel="icon" href="Images/logo.png" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="dashboard.css">
    

  </head>

  <body style="height: 3000px;">


  
<!-- HEADER -->
<?php
include "header.php";
?>
<!-- END HEADER -->




<!-- SIDEBAR -->
<?php
include "sidebar.php";
?>
<!-- END SIDEBAR -->





<!-- CONTENT -->
        <div class="col-lg-9 mt-3">
        <div class="card">
  <div class="card-header">
    LAPORAN NUTRISI ANAK
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

                <H1 style="center">-BELUM ADA DATA-</H1>


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