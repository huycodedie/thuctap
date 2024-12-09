
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
    header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&idgv=$magv");


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
                $result = ->query($checkSql);

                if ($result->num_rows > 0) {
                  
                    $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh', cuoiky = '$cuoiky' WHERE masv = '$masv' AND malhp = '$malhp'";
                    echo $masv;
                    if (!$conn->query($updateSql)) {
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
    header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&idgv=$magv");
}

// Hàm xuất dữ liệu ra Excel
if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Lấy dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT id, name, age, city FROM data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tạo file Excel mới
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tiêu đề cột
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Age');
        $sheet->setCellValue('D1', 'City');

        // Ghi dữ liệu vào file Excel
        $rowIndex = 2;
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowIndex, $row['id']);
            $sheet->setCellValue('B' . $rowIndex, $row['name']);
            $sheet->setCellValue('C' . $rowIndex, $row['age']);
            $sheet->setCellValue('D' . $rowIndex, $row['city']);
            $rowIndex++;
        }

        // Đặt tên file và tải về
        $fileName = "exported_data_" . date('Y-m-d_H-i-s') . ".xlsx";
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