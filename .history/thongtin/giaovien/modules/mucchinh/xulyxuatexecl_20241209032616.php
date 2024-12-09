<?php 
include('../../config/config.php');

require 'execl/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Truy vấn lấy dữ liệu
    $sql = "SELECT * FROM bangdiem d JOIN usersv s ON s.idsv = d.masv JOIN qllophocphan p ON p.malhp =  ";
    $result = mysqli_query($mysqli,$sql);

    if ($result && $result->num_rows > 0) {
        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'Mã sinh viên');
        

        // Ghi dữ liệu vào Excel
        $rowIndex = 2;
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowIndex, $row['idsv']);
           
            $rowIndex++;
        }

        $fileName = "BangDiem" . date('Y-m-d_H-i-s') . ".xlsx";
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer->save('php://output');
        exit;
    } else {
        echo "No data found for the specified class.";
    }
}
?>