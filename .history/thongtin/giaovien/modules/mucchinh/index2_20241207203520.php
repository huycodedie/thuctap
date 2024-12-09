<?php
// load_content.php

// Kiểm tra giá trị của action từ yêu cầu AJAX
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'sv-lop-hoc-phan':
            include('svhocphan.php');
            break;
        case 'doi':
            include('test2.php');
            break;
        default:
            echo "Action không hợp lệ";
            break;
    }
} else {
    echo "Không có action được yêu cầu.";
}
?>



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
        <?php include("svhocphan2.php") ?>
            </div>

    <script>
   $(document).on('click', '.load-content', function (e) {
    e.preventDefault();

    const action = $(this).data('action');
    console.log("Action selected: ", action); // Kiểm tra action đã chọn

    $.ajax({
        url: '"load_content.php"',
        method: "GET",
        data: { action: action },
        success: function (data) {
            console.log("Received data: ", data); // Kiểm tra dữ liệu nhận được
            $("#content").html(data);
        },
        error: function (xhr, status, error) {
            console.error("Error:", status, error);
            $("#content").html("Có lỗi xảy ra khi tải dữ liệu.");
        }
    });
});


    </script>
