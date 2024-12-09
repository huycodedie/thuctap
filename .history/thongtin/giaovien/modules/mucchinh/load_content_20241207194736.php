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
