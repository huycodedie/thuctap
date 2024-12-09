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
       
        </div    </div>

    <script>
        // Sử dụng AJAX để thay đổi nội dung động
        $(document).on('click', '.load-content', function (e) {
    e.preventDefault();
    
    const action = $(this).data('action');
    console.log("Action selected: ", action); // Kiểm tra action đã chọn

    $.get("load_content.php", { action: action }, function (data) {
        console.log("Received data: ", data); // Kiểm tra dữ liệu nhận được
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