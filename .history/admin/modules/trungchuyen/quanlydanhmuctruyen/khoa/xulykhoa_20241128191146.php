
<?php 
session_start();
//khoa
include('../../../../config/config.php');
$tenkhoa = $_POST['tenkhoa'];

if(isset($_POST['themkhoa'])){
    $errors = [];
    $sql_themkhoa = "INSERT INTO qlkhoa(tenkhoa) 
    VALUE('".$tenkhoa."')";
    if (!mysqli_query($mysqli, $sql_themkhoa)) {
        $errors[] = "Thêm không thành công. Vui lòng thử lại.";
    } else {
        $errors[] = "Thêm thành công.";
    }

    $_SESSION['errors'] = $errors; 
    header('location: ../../../../index.php?action=khoa');
    exit;

    
}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=khoa');
}else{
    $id=$_GET['idkhoa'];
    $sql_xoa="DELETE FROM qlkhoa WHERE idkhoa='".$id."'";
    if (!mysqli_query($mysqli, $sql_xo)) {
        $errors[] = "Xóa không thành công. Vui lòng thử lại.";
    } else {
        $errors[] = "Xóa thành công.";
    }
    $_SESSION['errors'] = $errors; 
    header('location: ../../../../index.php?action=khoa');
    exit;
}
?>