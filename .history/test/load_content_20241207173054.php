<?php
// Kiểm tra xem tham số action có tồn tại hay không
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Tùy thuộc vào action, tải nội dung tương ứng
    switch ($action) {
        case 'sv-lop-hoc-phan':
            include("svhocphan.php");
            break;
        case 'doi':
            include("test.php");
            break;
        default:
            echo "Nội dung không tồn tại!";
            break;
    }
} else {
    echo "Không có hành động nào được yêu cầu!";
}
?>
