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

    <div id="content">
        <form id="search-form">
        <input type="text" name="search" id="search" placeholder="Nhập tên sinh viên..." autocomplete="off">
        <button type="submit">Tìm kiếm</button>
    </form>
        <!-- Nội dung thay đổi sẽ được tải vào đây -->
        <?php include("svhocphan.php"); ?>
    </div>

    <script>
        // Sử dụng AJAX để thay đổi nội dung động
        $(document).on('click', '.load-content', function (e) {
            e.preventDefault();

            // Lấy action từ thuộc tính data-action
            const action = $(this).data('action');

            // Gửi yêu cầu AJAX đến server
            $.get("load_content.php", { action: action }, function (data) {
                // Tải nội dung trả về vào phần #content
                $("#content").html(data);
            });
        });
    </script>
    <script>
    // Xử lý sự kiện tìm kiếm bằng AJAX
    $("#search-form").on("submit", function (e) {
        e.preventDefault();

        // Lấy giá trị tìm kiếm từ ô input
        const searchQuery = $("#search").val();

        // Gửi yêu cầu AJAX đến server
        $.get("load_content.php", { action: "search", query: searchQuery }, function (data) {
            // Hiển thị kết quả tìm kiếm trong #search-results
            $("#search-results").html(data);
        });
    });
</script>
</body>
</html>
