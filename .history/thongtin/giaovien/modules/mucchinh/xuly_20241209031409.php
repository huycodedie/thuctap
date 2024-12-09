
<?php 
include('../../config/config.php');

require 'execl/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$quatrinh = $_POST['quatrinh'];
$magv = $_GET['magv'];
$cuoiky = $_POST['cuoiky'];
$sua = 1;
$malhp = isset($_GET['malhp']) ? $_GET['malhp'] : ''; 

if(isset($_POST['gvthemdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',cuoiky='".$cuoiky."',sua='".$sua."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&magv=$magv");


    exit();
}elseif(isset($_POST['themexcel'])){
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];

        $allowedTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'];

        if (in_array($fileType, $allowedTypes)) {
            $spreadsheet = IOFactory::load($fileTmpPath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

           
            foreach ($sheetData as $rowIndex => $row) {
                if ($rowIndex == 1) continue; 

                $masv = $row['B'];
                $quatrinh = $row['D'];
                $cuoiky = $row['E'];

             
                $checkSql = "SELECT masv FROM bangdiem WHERE masv = '$masv'";
                $result = $mysqli->query($checkSql);

                if ($result->num_rows > 0) {
                  
                    $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh', cuoiky = '$cuoiky' WHERE masv = '$masv' AND malhp = '$malhp'";
                    echo $masv;
                    if (!$mysqli->query($updateSql)) {
                        echo "Error: " . $mysqli->error;
                    }
                } else {
                
                    echo $masv;
                }
            }

            echo "Data uploaded and updated successfully!";
        } else {
            echo "Invalid file type. Please upload an Excel file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
    header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&magv=$magv");
}if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Truy vấn lấy dữ liệu
    $sql = "SELECT masv, mahp, magv, malhp FROM usersv ";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'Mã sinh viên');
        $sheet->setCellValue('B1', 'Mã học phần');
        $sheet->setCellValue('C1', 'Mã giảng viên');
        $sheet->setCellValue('D1', 'Mã lớp học phần');

        // Ghi dữ liệu vào Excel
        $rowIndex = 2;
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowIndex, $row['masv']);
            $sheet->setCellValue('B' . $rowIndex, $row['mahp']);
            $sheet->setCellValue('C' . $rowIndex, $row['magv']);
            $sheet->setCellValue('D' . $rowIndex, $row['malhp']);
            $rowIndex++;
        }

        // Đặt tên file và tải về
        $fileName = "BangDiem_" . date('Y-m-d_H-i-s') . ".xlsx";
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