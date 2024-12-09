<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$sql_danhsach = "SELECT*FROM usergv g
                 left JOIN bangdiem b ON b.magv = g.idgv
                 JOIN qllophocphan p ON p.malhp = b.malhp
                 JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]'ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach1 = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Danh sách sinh viên lớp học phần</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=lop-hoc-phan&idgv=<?php echo $user_id?>">khoa</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=sv-lop-hoc-phan&idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>">Sinh viên</a></li>
    </nav>
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Chức năng</h5>

              <!-- Default Table -->
              <!-- Liên kết cho danh sách lớp hành chính -->
<li class="nav-item">
    <a class="nav-link collapsed load-content" href="#" data-action="sv-lop-hoc-phan">
        <i class="bi bi-card-list"></i>
        <span>Danh sách lớp hành chính</span>
    </a>
</li>

<!-- Liên kết cho action khác -->
<li class="nav-item">
    <a class="nav-link collapsed load-content" href="#" data-action="doi">
        <i class="bi bi-card-list"></i>
        <span>Danh sách lớp hành chính</span>
    </a>
</li>

             <button><a class="nav-link collapsed load-content" href="#" data-action="doi"></a>hdss</button>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
        <div id="content">
<?php   include("svhocphan.php")        
?></div>
<script>
        // Sử dụng AJAX để thay đổi nội dung động
        $(document).on('click', '.load-content', function (e) {
            e.preventDefault();

            // Lấy action từ thuộc tính data-action
            const action = $(this).data('action');

            // Gửi yêu cầu AJAX đến server
            $.get("main2.php", { action: action }, function (data) {
                // Tải nội dung trả về vào phần #content
                $("#content").html(data);
            });
        });
   
 
</script>
</main>
