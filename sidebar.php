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
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user_profile')? 'active link-light ': 'link-dark' ;?>" aria-current="page" href="user_profile.php?x=user_profile"><i class="bi bi-person-fill"></i>  Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user_perkembangan')? 'active link-light ': 'link-dark' ;?>" href="user_perkembangan.php?x=user_perkembangan"><i class="bi bi-book-fill"></i></i>  Laporan Perkembangan Anak</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user_kegiatan')? 'active link-light ': 'link-dark' ;?>" href="user_kegiatan.php?x=user_kegiatan"><i class="bi bi-basket3-fill"></i></i>  Laporan Kegiatan Anak</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user_nutrisi')? 'active link-light ': 'link-dark' ;?>" href="user_nutrisi.php?x=user_nutrisi"><i class="bi bi-clipboard2-fill"></i>  Laporan Nutrisi Anak</a>
          </li>

        </ul>
      
      </div>
    </div>
  </div>
</nav>
        </div>
