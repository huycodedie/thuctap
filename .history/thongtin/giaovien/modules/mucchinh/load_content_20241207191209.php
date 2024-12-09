<?php
// main2.php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    echo "Action: " . $action;  // Thêm thông báo debug
    switch ($action) {
        case 'sv-lop-hoc-phan':
            include("svhocphan2.php");
            break;

        case 'doi':
            include("test2.php");
            break;

        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}

?>
