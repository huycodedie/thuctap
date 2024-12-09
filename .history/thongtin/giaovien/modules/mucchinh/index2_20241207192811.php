
<body>
    <div id="sidebar">
    <h1>sâs</h1>    
    <h1>âsasa</h1>
        <!-- Thanh chức năng cố định -->
        
            <a href="#" class="load-content" data-action="sv-lop-hoc-phan">Lớp học phần</a></li>
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
    // Sự kiện tìm kiếm với delegated events
$(document).on("submit", "#search-form", function (e) {
    e.preventDefault();

    const searchQuery = $("#search").val();

    $.get("load_content.php", { action: "search", query: searchQuery }, function (data) {
        $("#content").html(data);
    });
});

</script>
</body>

