
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
}elseif (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Lấy dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT masv, magv, malhp, quatrinh, cuoiky 
            FROM bangdiem ";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Mã sinh viên');
        $sheet->setCellValue('C1', 'Tên sinh viên');
        $sheet->setCellValue('D1', 'Quá trình');
        $sheet->setCellValue('E1', 'Cuối kỳ');

        // Ghi dữ liệu vào file Excel
        $rowIndex = 2;
        $i = 0;
        $fileName = "Dữ liệu lớp Không xác định " . date('Y-m-d_H-i-s') . ".xlsx"; // Tên mặc định

        while ($row = myqli) {
            $i++;
            $sheet->setCellValue('A' . $rowIndex, $i);
            $sheet->setCellValue('B' . $rowIndex, $row['masv']);
            $sheet->setCellValue('C' . $rowIndex, $row['magv']);
            $sheet->setCellValue('D' . $rowIndex, $row['quatrinh']);
            $sheet->setCellValue('E' . $rowIndex, $row['cuoiky']);
            $rowIndex++;

            // Thiết lập tên file nếu có dữ liệu lớp học phần
            if ($fileName === "Dữ liệu lớp Không " . date('Y-m-d_H-i-s') . ".xlsx" && !empty($row['tenlhp'])) {
                $fileName = "Dữ liệu lớp " . $row['tenlhp'] . " " . date('Y-m-d_H-i-s') . ".xlsx";
            }
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer->save('php://output');
        exit;
    } else {
        echo "No data found in the database.";
    }
}


?>