<?php 
// Kiểm tra tham số 'action'
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'sv-lop-hoc-phan':
            include("test.php");
            break;

        case 'doi':
            include("test.php");
            break;

        case 'search':
            // Lấy giá trị tìm kiếm
            $query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

            // Tìm kiếm sinh viên trong cơ sở dữ liệu
            $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";
            $result = $conn->query($sql);

            // Hiển thị kết quả
            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>STT</th><th>Mã Sinh Viên</th><th>Tên Sinh Viên</th></tr>";
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $stt++ . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Không tìm thấy sinh viên nào!";
            }
            break;

        default:
            echo "Hành động không hợp lệ!";
            break;
    }
} else {
    echo "Không có hành động nào được yêu cầu!";
}


?>
