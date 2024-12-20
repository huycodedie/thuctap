<?php 
include('../../config/config.php');

require 'execl/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_GET['action']) && $_GET['action'] == 'xuatdssv') {
    // Truy vấn lấy dữ liệu
    $tukhoa = $_GET['tukhoa'];
    $malhc = $_GET['malhc'];
    $sql = "SELECT b.masv, s.usernamesv, b.quatrinh, b.cuoiky, s.diachi, s.sdt,
            SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) AS tong,
    SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END) AS tinchi,
    COUNT(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN b.madiem END) AS so_mon
           FROM usersv s
           JOIN bangdiem b ON s.idsv = b.masv
           JOIN qlhocphan P ON p.mahp = b.mahp
           WHERE s.malhc = '$_GET[malhc]' AND ( usernamesv LIKE '%".$tukhoa."%' OR idsv LIKE '%".$tukhoa."%')
           GROUP BY b.masv
           ORDER BY tong DESC";
    $result = mysqli_query($mysqli,$sql);
    $sql2 = "SELECT * FROM qllophanhchinh c
                    JOIN qlkhoa k ON c.makhoa = k.idkhoa    
                    WHERE idlhc =$malhc ";
    $result2 = mysqli_query($mysqli,$sql2);
    $ten = mysqli_fetch_assoc($result2);
    if ($result && $result->num_rows > 0) {
        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'MSV');
        $sheet->setCellValue('C1', 'Tên sinh viên');
        $sheet->setCellValue('D1', 'Tên sinh viên');
        $sheet->setCellValue('E1', 'SĐT');
        $sheet->setCellValue('F1', 'Địa chỉ');

        // Ghi dữ liệu vào Excel
        $rowIndex = 2;
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            if($row['so_mon']>0){
                $he =(($row['tong']/ $row['tinchi'])*4)/10;
            }else{
                $he="Chưa học môn nào";
            }
            $sheet->setCellValue('A' . $rowIndex, $i);
            $sheet->setCellValue('B' . $rowIndex, $row['masv']);
            $sheet->setCellValue('C' . $rowIndex, $row['usernamesv']);
            $sheet->setCellValue('D' . $rowIndex, $he);
            $sheet->setCellValue('E' . $rowIndex, $row['sdt']);
            $sheet->setCellValue('F' . $rowIndex, $row['diachi']);
            
            $rowIndex++;
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh'); 
        $fileName = "Danh sách lớp " .$ten['tenlop']." ".$ten['tenkhoa']." ". date('Y-m-d  H-i-s') . ".xlsx";
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