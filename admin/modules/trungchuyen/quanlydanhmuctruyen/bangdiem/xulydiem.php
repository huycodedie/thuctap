
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
        $errors[] = "Bỏ quyền thành công.";
    }else{
        $sql_themdiem = "UPDATE bangdiem SET sua='".$sua."' 
        WHERE madiem = '$_GET[madiem]'";
        mysqli_query($mysqli,$sql_themdiem);
        $errors[] = "Cấp quyền thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=diem');
    exit;
}
if(isset($_POST['thilai'])){
    $thilai = 0;
    $thilai2 = 1;
    $checksua = "SELECT * FROM bangdiem WHERE madiem = '$_GET[madiem]' AND thilai ='$thilai'";
    $resultsua = mysqli_query($mysqli, $checksua);
    if(mysqli_num_rows($resultsua)>0){

        $sql_themdiem = "UPDATE bangdiem SET thilai='".$thilai2."' 
        WHERE madiem = '$_GET[madiem]'";
        mysqli_query($mysqli,$sql_themdiem);
        $errors[] = "Bỏ quyền thành công.";
    }else{
        $sql_themdiem = "UPDATE bangdiem SET thilai='".$thilai."' 
        WHERE madiem = '$_GET[madiem]'";
        mysqli_query($mysqli,$sql_themdiem);
        $errors[] = "Cấp quyền thi lại thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=diem');
    exit;
}else{
    $id=$_GET['madiem'];
    $sql_xoa="DELETE FROM bangdiem WHERE madiem='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    $errors[] = "Xóa điểm thành công.";
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=diem');
    exit;
}
?>