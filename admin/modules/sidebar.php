 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=dau">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=khoa">
      <i class="bi bi-grid"></i>
      <span>Quản lý khoa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=lhc">
      <i class="bi bi-grid"></i>
      <span>Quản lý lớp hành chính</span>
    </a>
  </li>
  <li class="nav-item">                                                                                                 
    <a class="nav-link collapsed" href="index.php?action=hp">
      <i class="bi bi-grid"></i>
      <span>Quản lý học phần</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=lhp">
      <i class="bi bi-grid"></i>
      <span>Quản lý lớp học phần</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=diem">
      <i class="bi bi-grid"></i>
      <span>Bảng điểm</span>
    </a>
  </li>
  <!--<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="index.php?action=chuong">
      <i class="bi bi-layout-text-window-reverse"></i><span>Chương</span></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?action=chuong">
              <i class="bi bi-circle"></i><span>Thông tin</span>
            </a>
          </li>
    </ul>

    
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Trang truyện</span></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?action=trang">
              <i class="bi bi-circle"></i><span>Thông tin</span>
            </a>
          </li>
    </ul>
    
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="index.php?action=theloai">
      <i class="bi bi-bar-chart"></i><span>Thể loại</span></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?action=theloai">
              <i class="bi bi-circle"></i><span>Thông tin</span>
            </a>
          </li>
    </ul>
  </li>-->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?action=profile">
      <i class="bi bi-person"></i>
      <span>Tài khoản</span>
    </a>
  </li><!-- End Profile Page Nav -->

 

  

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

