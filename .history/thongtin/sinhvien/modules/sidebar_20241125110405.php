 <?php 
 $usersv = mysqli_real_escape_string($mysqli, $_SESSION['usersv']); 

 $sql_danhsach = "SELECT * FROM usersv WHERE idsv = '$usersv'";
 $query_danhsach = mysqli_query($mysqli, $sql_danhsach);
 ?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <?php $row = mysqli_fetch_array($query_danhsach);
  if($row){ ?>
<li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=thong-tin-sinh-vien&idsv=<?php echo $row['idsv'] ?>">
      <i class="bi bi-card-list"></i>
      <span>Thông tin sinh viên</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=bang-diem&masv=<?php echo $row['idsv'] ?>">
      <i class="bi bi-card-list"></i>
      <span>Môn học</span>
    </a>
  </li>

<?php } ?>


  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=1">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Đăng xuất</span>
    </a>
  </li><!-- End Login Page Nav -->



  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các phần tử có class 'nav-link'
    const navLinks = document.querySelectorAll('.nav-link');

    // Áp dụng trạng thái đã lưu từ localStorage
    navLinks.forEach(function(navLink, index) {
      // Kiểm tra trạng thái đã lưu cho từng mục menu
      const isCollapsed = localStorage.getItem('nav-link-' + index);
      if (isCollapsed === 'false') {
        navLink.classList.remove('collapsed'); // Giữ mở rộng
      } else {
        navLink.classList.add('collapsed'); // Giữ thu gọn
      }
    });

    // Thêm sự kiện click vào mỗi nav-link
    navLinks.forEach(function(navLink, index) {
      navLink.addEventListener('click', function(e) {
        // Xử lý trạng thái collapsed trước khi điều hướng
        if (this.classList.contains('collapsed')) {
          this.classList.remove('collapsed');
          localStorage.setItem('nav-link-' + index, 'false'); // Lưu trạng thái mở rộng
        } else {
          this.classList.add('collapsed');
          localStorage.setItem('nav-link-' + index, 'true'); // Lưu trạng thái thu gọn
        }

        // Thu gọn các mục khác
        navLinks.forEach(function(otherLink, otherIndex) {
          if (otherLink !== navLink) {
            otherLink.classList.add('collapsed');
            localStorage.setItem('nav-link-' + otherIndex, 'true'); // Lưu trạng thái thu gọn cho mục khác
          }
        });

        // Không ngăn chặn hành vi điều hướng mặc định (href)
        // Điều hướng tới URL vẫn sẽ diễn ra sau khi xử lý trạng thái collapsed
      });
    });
  });
</script>
</ul>

</aside><!-- End Sidebar-->