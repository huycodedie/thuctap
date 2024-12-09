
<?php 
session_start();
//khoa
include('../../../../config/config.php');
$tenkhoa = $_POST['tenkhoa'];

if(isset($_POST['themkhoa'])){
    
    $sql_themkhoa = "INSERT INTO qlkhoa(tenkhoa) VALUE('$tenkhoa')";
if (!mysqli_query($mysqli, $sql_themkhoa)) {
    $error[] = "Thêm không thành công. Lỗi: " . mysqli_error($mysqli);
} else {
    $errors[] = "Thêm thành công.";
}


}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    $errors[]="Sửa thành công";
    
    
}else{
    $id=$_GET['idkhoa'];
    $errors = []; 
    $error = []; 
    $sql_check = "SELECT COUNT(*) FROM qllophanhchinh WHERE makhoa = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);

    $sql_check2 = "SELECT COUNT(*) FROM qlhocphan WHERE makhoa = '$id'";
    $result_check2 = mysqli_query($mysqli, $sql_check2);
    $row = mysqli_fetch_row($result_check);
    $row2 = mysqli_fetch_row($result_check2);
    if ($row[0] > 0) {
        $error[] = "Không thể xóa Khoa này vì có liên quan trong Lớp hành chính.";
    }elseif($row2[0] > 0){
        $error[] = "Không thể xóa Khoa này vì có liên quan trong học phần.";
    }else {  
        $sql_view = "DELETE FROM viewusergv_khoa WHERE makhoa = '$id'";


        
        $sql_xoa = "DELETE FROM qlkhoa WHERE idkhoa = '$id'";
        if (!mysqli_query($mysqli, $sql_xoa)) {         
            $error[] = "Không thể xóa khoa. Lỗi: " . mysqli_error($mysqli);
        } else {       
            $errors[] = "Xóa khoa thành công.";
        }
    }
    
}
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}
if (!empty($error)) {
    $_SESSION['error'] = $error;
}
header('Location: ../../../../index.php?action=khoa');
exit();
?>