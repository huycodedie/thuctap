
<?php 
session_start();
include('../../../../config/config.php');
$quatrinh = $_POST['quatrinh'];

$cuoiky = $_POST['cuoiky'];


if(isset($_POST['themdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',cuoiky='".$cuoiky."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header('location:../../../../index.php?action=diem');
}
if(isset($_POST['sua'])){
    $sua = 0;
    $sua2 = 1;
    $checksua = "SELECT * FROM bangdiem WHERE madiem = '$_GET[madiem]' AND sua ='$sua'";
    $resultsua = mysqli_query($mysqli, $checksua);
    if(mysqli_num_rows($resultsua)>0){

        $sql_themdiem = "UPDATE bangdiem SET sua='".$sua2."' 
        WHERE madiem = '$_GET[madiem]'";
        mysqli_query($mysqli,$sql_themdiem);
        $errors[] = "thêm sinh viên vào lớp thành công.";
    }else{
        $sql_themdiem = "UPDATE bangdiem SET sua='".$sua."' 
        WHERE madiem = '$_GET[madiem]'";
        mysqli_query($mysqli,$sql_themdiem);
        $errors[] = "thêm sinh viên vào lớp thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=diem');
    exit;
}else{
    $id=$_GET['madiem'];
    $sql_xoa="DELETE FROM bangdiem WHERE madiem='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
   
}
?>