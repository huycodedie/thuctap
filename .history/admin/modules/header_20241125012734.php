<?php 
$sql_danhsach = "SELECT *
               FROM users
               WHERE id LIMIT 1"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>


<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="http://localhost/cnpm/admin/" class="logo d-flex align-items-center">
        <img src="https://congsv.vinhuni.edu.vn/sv/assets/images/eUniversity/logo_dhvinh.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       
        
     <li class="nav-item dropdown pe-3">
          <?php 
          while($row = mysqli_fetch_array($query_danhsach)){
          ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['username'] ?></span>
          </a> 

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="index.php?action=1">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
          <?php } ?>
        <!--</li> End Profile Nav -->
     </li>
     <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                       
                  
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
