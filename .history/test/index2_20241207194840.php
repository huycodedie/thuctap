<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Loading</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="sidebar">
        <!-- Thanh chức năng cố định -->
        <ul>
            <li><a href="#" class="load-content" data-action="sv-lop-hoc-phan">Lớp học phần</a></li>
            <li><a href="#" class="load-content" data-action="doi">Chức năng khác</a></li>
        </ul>
    </div>
    <form id="search-form">
        <input type="text" name="search" id="search" placeholder="Nhập tên sinh viên..." autocomplete="off">
        <button type="submit">Tìm kiếm</button>
    </form>
    <div id="content">
    
        <!-- Nội dung thay đổi sẽ được tải vào đây -->
       
        <?php include("svhocphan2.php"); // Nội dung mặc định ?>
    </div>

    <script>
     $(document).on('click', '.load-content', function (e) {
    e.preventDefault();

    const action = $(this).data('action');
    const newUrl = "index.php?action=" + action;
    
    // Cập nhật URL mà không tải lại trang
    history.pushState(null, null, newUrl);

    $.get("load_content.php", { action: action }, function (data) {
        $("#content").html(data);
    });
});

    </script>
    <script>
    // Sự kiện tìm kiếm với delegated events
$(document).on("submit", "#search-form", function (e) {
    e.preventDefault();

    const searchQuery = $("#search").val();

    $.get("load_content.php", { action: "search", query: searchQuery }, function (data) {
        $("#content").html(data);
    });
});

</script>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>
