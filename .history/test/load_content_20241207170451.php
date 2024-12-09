<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Xử lý từng action
    switch ($action) {
        case 'action1':
            // Nội dung hoặc logic của action 1
            echo "<h2>Action 1 hoàn thành</h2><p>Đây là nội dung của action 1.</p>";
            break;

        case 'action2':
            // Nội dung hoặc logic của action 2
            echo "<h2>Action 2 hoàn thành</h2><p>Đây là nội dung của action 2.</p>";
            break;

        case 'action3':
            // Nội dung hoặc logic của action 3
            echo "<h2>Action 3 hoàn thành</h2><p>Đây là nội dung của action 3.</p>";
            break;

        default:
            echo "<p>Action không hợp lệ.</p>";
            break;
    }
} else {
    echo "<p>Không có action nào được gửi.</p>";
}
?>
