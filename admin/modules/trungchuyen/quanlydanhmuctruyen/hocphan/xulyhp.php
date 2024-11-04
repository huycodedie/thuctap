
<?php 
include('../../../../config/config.php');
$malhc = $_POST['malhc'];
$tenhp = $_POST['tenhp'];


if(isset($_POST['themhp'])){
    $sql_themhp = "INSERT INTO qlhocphan(tenhp,malhc) 
    VALUE('".$tenhp."','".$malhc."')";
    mysqli_query($mysqli,$sql_themhp);
    header('location:../../../../index.php?action=hp');
}elseif(isset($_POST['suahp'])){
    $sql_sua = "UPDATE qlhocphan SET tenhp='".$tenhp."',malhc='".$malhc."'
    WHERE mahp = '$_GET[mahp]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=hp');
}else{
    $id=$_GET['mahp'];
    $sql_xoa="DELETE FROM qlhocphan WHERE mahp='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=hp');
}
?>