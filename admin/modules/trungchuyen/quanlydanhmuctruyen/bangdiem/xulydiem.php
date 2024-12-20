
<?php 
session_start();
include('../../../../config/config.php');
$data = json_decode(file_get_contents('php://input'), true);
$quatrinh = $_POST['quatrinh'];

$cuoiky = $_POST['cuoiky'];


if(isset($_POST['themdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',cuoiky='".$cuoiky."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header('location:../../../../index.php?action=diem');
}elseif (isset($data['madiem'], $data['sua'])) {
    $madiem = $data['madiem'];
    $sua = $data['sua'];
    $updateSql = "UPDATE bangdiem SET sua = ? WHERE madiem = ?";
    $stmt = $mysqli->prepare($updateSql);
    $stmt->bind_param('ii', $sua, $madiem);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Không thể cập nhật dữ liệu']);
    }
}elseif (isset($data['madiem'], $data['thilai'])) {
    $madiem = $data['madiem'];
    $thilai = $data['thilai'];

    $updateSql = "UPDATE bangdiem SET thilai = ? WHERE madiem = ?";
    $stmt = $mysqli->prepare($updateSql);
    $stmt->bind_param('ii', $thilai, $madiem);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Không thể cập nhật dữ liệu']);
    }
}
?>

