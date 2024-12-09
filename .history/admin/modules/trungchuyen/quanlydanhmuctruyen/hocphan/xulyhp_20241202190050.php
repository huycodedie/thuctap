
<?php 
session_start();

include('../../../../config/config.php');
$makhoa = $_POST['makhoa'];
$tenhp = $_POST['tenhp'];
$tinchi


if(isset($_POST['themhp'])){
    $sql_themhp = "INSERT INTO qlhocphan(tenhp,makhoa) 
    VALUE('".$tenhp."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themhp);
    $errors[] = "Thêm học phần thành công.";
}elseif(isset($_POST['suahp'])){
    $sql_sua = "UPDATE qlhocphan SET tenhp='".$tenhp."',makhoa='".$makhoa."'
    WHERE mahp = '$_GET[mahp]' ";
    mysqli_query($mysqli,$sql_sua);
    $errors[] = "Sửa học phần thành công.";
}else{
    $id=$_GET['mahp'];
    $sql_check = "SELECT COUNT(*) FROM qllophocphan WHERE mahp = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);
    $row = mysqli_fetch_row($result_check);
    
    if ($row[0] > 0) {
        $error[] = "Không thể xóa học phần này vì có liên quan trong Lớp học phần.";
    } else {  
        $sql_xoa = "DELETE FROM qlhocphan WHERE mahp = '$id'";
        if (!mysqli_query($mysqli, $sql_xoa)) {         
            $error[] = "Không thể xóa học phần. Lỗi: " . mysqli_error($mysqli);
        } else {       
            $errors[] = "Xóa học phần thành công.";
        }
    }
    
}
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}
if (!empty($error)) {
    $_SESSION['error'] = $error;
}
header('Location: ../../../../index.php?action=hp');
exit;
?>