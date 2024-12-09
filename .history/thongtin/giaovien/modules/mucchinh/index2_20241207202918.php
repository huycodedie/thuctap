<?php
// Xử lý yêu cầu AJAX khi người dùng nhấn nút thay đổi giao diện
if (isset($_GET['action']) && $_GET['action'] == 'change') {
    // Gửi về nội dung mới cho danh sách
    echo "<ul id='itemList'>
            <li>Item A</li>
            <li>Item B</li>
            <li>Item C</li>
          </ul>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao Diện Cũ</title>
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
            // Gửi yêu cầu AJAX để thay đổi danh sách
            $.ajax({
                url: '', // Cùng file này
                type: 'GET',
                data: { action: 'change' }, // Thêm tham số action để biết đây là yêu cầu thay đổi giao diện
                success: function(response) {
                    // Thay đổi nội dung của phần 'itemList' bằng dữ liệu mới trả về từ server
                    $('#itemList').html(response);
                }
            });
        });
    </script>

