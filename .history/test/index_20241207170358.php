<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực hiện hành động nối tiếp</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .menu { float: left; width: 20%; }
        .content { float: left; width: 75%; padding: 10px; }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <li><button onclick="startActions()">Chạy các hành động</button></li>
        </ul>
    </div>
    <div class="content" id="content-area">
        <!-- Nội dung sẽ thay đổi ở đây -->
        <p>Chào mừng! Nhấn nút bên trái để chạy các hành động nối tiếp.</p>
    </div>

    <script>
        // Hàm thực hiện các hành động nối tiếp
        function startActions() {
            // Chạy action đầu tiên
            $.ajax({
                url: 'load_content.php',
                type: 'POST',
                data: { action: 'action1' }, // Gửi yêu cầu cho action 1
                success: function(response) {
                    $('#content-area').html(response); // Hiển thị kết quả action 1
                    
                    // Chạy action tiếp theo sau khi action 1 hoàn tất
                    $.ajax({
                        url: 'load_content.php',
                        type: 'POST',
                        data: { action: 'action2' }, // Gửi yêu cầu cho action 2
                        success: function(response) {
                            $('#content-area').append(response); // Hiển thị kết quả action 2
                            
                            // Chạy action tiếp theo nữa (nếu cần)
                            $.ajax({
                                url: 'load_content.php',
                                type: 'POST',
                                data: { action: 'action3' }, // Gửi yêu cầu cho action 3
                                success: function(response) {
                                    $('#content-area').append(response); // Hiển thị kết quả action 3
                                },
                                error: function() {
                                    alert('Có lỗi xảy ra ở action 3!');
                                }
                            });
                        },
                        error: function() {
                            alert('Có lỗi xảy ra ở action 2!');
                        }
                    });
                },
                error: function() {
                    alert('Có lỗi xảy ra ở action 1!');
                }
            });
        }
    </script>
</body>
</html>
