
<?php 
session_start();
//khoa
include('../../../../config/config.php');
$tenkhoa = $_POST['tenkhoa'];
$errors = [];
if(isset($_POST['themkhoa'])){
    
    $sql_themkhoa = "INSERT INTO qlkhoa(tenkhoa) VALUE('$tenkhoa')";
if (!mysqli_query($mysqli, $sql_themkhoa)) {
    $errors[] = "Thêm không thành công. Lỗi: " . mysqli_error($mysqli);
} else {
    $errors[] = "Thêm thành công.";
}
$_SESSION['errors'] = $errors; 
header('Location: ../../../../index.php?action=khoa');
exit;

}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    $errors[]="Sửa thành công";
    $_SESSION['errors'] = $errors; 
header('Location: ../../../../index.php?action=khoa');
exit;
    
}else{
    $id=$_GET['idkhoa'];
    $sql_check = "SELECT COUNT(*) FROM qllophanhchinh WHERE mahp = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);

    $sql_check2 = "SELECT COUNT(*) FROM qlhocphan WHERE makhoa = '$id'";
    $result_check2 = mysqli_query($mysqli, $sql_check2);
    $row = mysqli_fetch_row($result_check);
    $row2 = mysqli_fetch_row($result_check2);
    if ($row[0] > 0) {
        $errors[] = "Không thể xóa học phần này vì có liên quan trong Lớp học phần.";
    }elseif($row2[0] > 0){
        $errors[] = "Không thể xóa học phần này vì có liên quan trong Lớp học phần.";
    }else {  
        $sql_xoa = "DELETE FROM qlhocphan WHERE mahp = '$id'";
        if (!mysqli_query($mysqli, $sql_xoa)) {         
            $errors[] = "Không thể xóa học phần. Lỗi: " . mysqli_error($mysqli);
        } else {       
            $errors[] = "Xóa học phần thành công.";
        }
    }
    $_SESSION['errors'] = $errors; 
    header('location: ../../../../index.php?action=khoa');
    exit;
}
?>