<?php 
include('../../config/config.php');

require 'execl/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Truy vấn lấy dữ liệu
    $malhp = $_GET['malhp'];
    $sql = "SELECT * FROM bangdiem d 
                    JOIN usersv s ON s.idsv = d.masv 
                    JOIN qllophocphan p ON p.malhp = d.malhp 
                    WHERE d.malhp = $malhp";
    $result = mysqli_query($mysqli,$sql);
    $ten = mysqli_fetch_assoc($result);
    if ($result && $result->num_rows > 0) {
        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'MSV');
        $sheet->setCellValue('C1', 'Tên sinh viên');
        $sheet->setCellValue('D1', 'Quá trình');
        $sheet->setCellValue('E1', 'Cuối kỳ');

        // Ghi dữ liệu vào Excel
        $rowIndex = 2;
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $sheet->setCellValue('A' . $rowIndex, $i);
            $sheet->setCellValue('B' . $rowIndex, $row['masv']);
            $sheet->setCellValue('C' . $rowIndex, $row['usernamesv']);
            $sheet->setCellValue('D' . $rowIndex, $row['quatrinh']);
            $sheet->setCellValue('E' . $rowIndex, $row['cuoiky']);
            
            $rowIndex++;
        }

        $fileName = "Danh sách lớp " .$ten['tenlhp']." "."". date('Y-m-d_H-i-s'). ")" . ".xlsx";
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