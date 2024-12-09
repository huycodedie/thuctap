if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Truy vấn lấy dữ liệu
    $sql = "SELECT * FROM usersv ";
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