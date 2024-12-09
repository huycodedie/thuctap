
<?php 
//khoa
include('../../../../config/config.php');
$tenkhoa = $_POST['tenkhoa'];


if (isset($_SESSION['errors'])) {
    echo '<pre>';
    print_r($_SESSION['errors']);
    echo '</pre>';
}



echo $tenkhoa;

if(isset($_POST['themkhoa'])){
    $errors = [];
    $sql_themkhoa = "INSERT INTO qlkhoa(tenkhoa) 
    VALUE('".$tenkhoa."')";
    if (!mysqli_query($mysqli, $sql_themkhoa)) {
        $errors[] = "Thêm không thành công. Vui lòng thử lại.";
    } else {
        $errors[] = "Thêm thành công.";
    }
    session_start(); 
    $_SESSION['errors'] = $errors; 
    

    
}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=khoa');
}else{
    $id=$_GET['idkhoa'];
    $sql_xoa="DELETE FROM qlkhoa WHERE idkhoa='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=khoa');
}
?>