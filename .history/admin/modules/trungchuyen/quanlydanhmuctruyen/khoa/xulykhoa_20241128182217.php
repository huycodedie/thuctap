
<?php 
//khoa
include('../../../../config/config.php');
$tenkhoa = $_POST['tenkhoa'];





if(isset($_POST['themkhoa'])){
    $sql_themkhoa = "INSERT INTO qlkhoa(tenkhoa) 
    VALUE('".$tenkhoa."')";
     if(!mysqli_query($mysqli,$sql_themkhoa)){
        $errors[] = "Dòng " . ($index + 1) . ": Lỗi khi thêm vào CSDL.";
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=lhp');
    }else{
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=lhp');
    }

    header('location:../../../../index.php?action=khoa');
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