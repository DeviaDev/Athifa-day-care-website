<div class="container-lg">
    <div class="row">
        <div class="col-lg-3" >    
        <nav class="navbar navbar-expand-lg rounded border mt-3" style="background-color:rgb(255, 249, 237)">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_profile')? 'active link-light ': 'link-dark' ;?>" aria-current="page" href="admin_profile.php?x=admin_profile"><i class="bi bi-person-fill"></i>  Profile Pendaftar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_kelola_akun')? 'active link-light ': 'link-dark' ;?>" href="admin_kelola_akun.php?x=admin_kelola_akun"><i class="bi bi-person-fill"></i></i>  Kelola Akun</a>
          </li>


          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_pertanyaan')? 'active link-light ': 'link-dark' ;?>" href="admin_pertanyaan.php?x=admin_pertanyaan"><i class="bi bi-clipboard2-fill"></i></i>  Data Ajuan Pertanyaan</a>
          </li>


          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_perkembangan')? 'active link-light ': 'link-dark' ;?>" href="admin_perkembangan.php?x=admin_perkembangan"><i class="bi bi-book-fill"></i></i>  Laporan Perkembangan Anak (non_function)</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_kegiatan')? 'active link-light ': 'link-dark' ;?>" href="admin_kegiatan.php?x=admin_kegiatan"><i class="bi bi-book-fill"></i></i>  Laporan Kegiatan Anak (non_function)</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_nutrisi')? 'active link-light ': 'link-dark' ;?>" href="admin_nutrisi.php?x=admin_nutrisi"><i class="bi bi-book-fill"></i>  Laporan Nutrisi Anak (non_function)</a>
          </li>

        </ul>
      
      </div>
    </div>
  </div>
</nav>
        </div>
