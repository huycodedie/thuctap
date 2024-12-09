<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Loading</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  
<h1>Giao Diện Cũ</h1>

<!-- Phần giao diện cần thay đổi -->
<div id="content">
    <ul id="itemList">
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    </ul>
</div>

<button id="changeButton">Chuyển giao diện danh sách</button>

<script>
    $('#changeButton').click(function() {
        $.ajax({
            url: 'load_content.php', // Gửi yêu cầu đến server
            type: 'GET',
            success: function(response) {
                // Thay đổi nội dung của phần 'itemList' bằng dữ liệu mới trả về từ server
                $('#itemList').html(response);
            }
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
