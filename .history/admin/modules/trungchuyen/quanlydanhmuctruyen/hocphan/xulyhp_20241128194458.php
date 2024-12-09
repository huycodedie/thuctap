
<?php 
session_start();

include('../../../../config/config.php');
$makhoa = $_POST['makhoa'];
$tenhp = $_POST['tenhp'];


if(isset($_POST['themhp'])){
    $sql_themhp = "INSERT INTO qlhocphan(tenhp,makhoa) 
    VALUE('".$tenhp."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themhp);
    header('location:../../../../index.php?action=hp');
}elseif(isset($_POST['suahp'])){
    $sql_sua = "UPDATE qlhocphan SET tenhp='".$tenhp."',makhoa='".$makhoa."'
    WHERE mahp = '$_GET[mahp]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=hp');
}else{
    $id=$_GET['mahp'];
    $sql_check = "SELECT COUNT(*) FROM qllophocphan WHERE mahp = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);
    $row = mysqli_fetch_row($result_check);
    
    // Nếu có bản ghi trong bảng 'bangdiem' liên quan đến 'mahp', không cho phép xóa
    if ($row[0] > 0) {
        $errors[] = "Không thể xóa học phần này vì có liên quan trong Lớp ho.";
    } else {
        // Nếu không có bản ghi liên quan, thực hiện xóa học phần
        $sql_xoa = "DELETE FROM qlhocphan WHERE mahp = '$id'";
    
        if (!mysqli_query($mysqli, $sql_xoa)) {
            // Nếu có lỗi khi thực hiện xóa, lấy thông báo lỗi chi tiết từ MySQL
            $errors[] = "Không thể xóa học phần. Lỗi: " . mysqli_error($mysqli);
        } else {
            // Thông báo thành công
            $errors[] = "Xóa học phần thành công.";
        }
    }
    
    // Lưu thông báo lỗi hoặc thành công vào session
    $_SESSION['errors'] = $errors;
    
    // Chuyển hướng về trang với thông báo
    header('Location: ../../../../index.php?action=hp');
    exit;
}
?>