<!-- file: index.php -->
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
</body>
</html>
