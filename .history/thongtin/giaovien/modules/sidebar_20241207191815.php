<?php
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']); 

    $sql_danhsach = "SELECT * FROM usergv WHERE idgv = '$user_id'";
    $query_danhsach = mysqli_query($mysqli, $sql_danhsach);

?>
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<?php 
   while($row = mysqli_fetch_array($query_danhsach)){
    ?>
<li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=ho-so-giao-vien&idgv=<?php echo $row['idgv'] ?>">
      <i class="bi bi-card-list"></i>
          <span>Hồ sơ giáo viên</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=khoa&idgv=<?php echo $row['idgv'] ?>">
      <i class="bi bi-card-list"></i>
      <span>Danh sách lớp hành chính</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=lop-hoc-phan&idgv=<?php echo $row['idgv'] ?>">
      <i class="bi bi-card-list"></i>
      <span>Danh sách lớp học phần</span>
    </a>
  </li>
  
  <?php }?>
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=test2">
      <i class="bi bi-card-list"></i>
      <span>Danh sách lớp học phần</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=1">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Đăng xuất</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->