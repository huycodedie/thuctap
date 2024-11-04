 <!-- ======= Sidebar ======= -->
 <?php 
// Giả sử bạn đã kết nối vào cơ sở dữ liệu và có biến $mysqli là đối tượng kết nối
$main_menu_query = "SELECT * FROM menusv WHERE parent_id = 1 ORDER BY thutu"; 
$main_menu_result = $mysqli->query($main_menu_query); 
?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">



  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=1">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Sign Out</span>
    </a>
  </li><!-- End Login Page Nav -->

  </li><!-- End Blank Page Nav -->

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